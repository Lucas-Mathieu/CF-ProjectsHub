<?php

require_once __DIR__ . '/../../core/Database.php';

class PostModel
{
    private $db;

    public function __construct()
    {
        $this->db = database::getConnection();
    }

    public function getAllPosts()
    {
        $stmt = $this->db->query("
            SELECT post.*, user.name AS author_name 
            FROM post 
            JOIN user ON post.id_user = user.id 
            ORDER BY post.date_created DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($id)
    {
        $stmt = $this->db->prepare("
            SELECT post.*, user.name AS author_name 
            FROM post 
            JOIN user ON post.id_user = user.id 
            WHERE post.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLikeByUserAndPost($userId, $postId)
    {
        $stmt = $this->db->prepare("SELECT * FROM post_like WHERE id_user = :user_id AND id_post = :post_id");
        $stmt->execute(['user_id' => $userId, 'post_id' => $postId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLikesCount($postId)
    {
        $sql = "SELECT like_count FROM post WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$postId]);
        $result = $stmt->fetch();
        return $result['like_count'];
    }

    public function addLike($userId, $postId)
    {
        $this->db->beginTransaction();

        $stmt = $this->db->prepare("INSERT INTO post_like (id_user, id_post, date) VALUES (:user_id, :post_id, NOW())");
        $stmt->execute(['user_id' => $userId, 'post_id' => $postId]);

        $this->db->prepare("UPDATE post SET like_count = like_count + 1 WHERE id = :post_id")
                ->execute(['post_id' => $postId]);

        $this->db->commit();
    }

    public function removeLike($userId, $postId)
    {
        $this->db->beginTransaction();

        $stmt = $this->db->prepare("DELETE FROM post_like WHERE id_user = :user_id AND id_post = :post_id");
        $stmt->execute(['user_id' => $userId, 'post_id' => $postId]);

        $this->db->prepare("UPDATE post SET like_count = GREATEST(like_count - 1, 0) WHERE id = :post_id")
                ->execute(['post_id' => $postId]);

        $this->db->commit();
    }

    public function createPost($userId, $title, $text)
    {
        $stmt = $this->db->prepare("
            INSERT INTO post (id_user, title, text, date_created, date_modified, like_count)
            VALUES (:id_user, :title, :text, NOW(), NOW(), 0)
        ");
        $stmt->execute([
            'id_user' => $userId,
            'title' => $title,
            'text' => $text
        ]);
    
        return $this->db->lastInsertId();
    }

    public function attachTagsToPost($postId, $tagIds)
    {
        $stmt = $this->db->prepare("INSERT INTO post_tag (id_post, id_tag) VALUES (:id_post, :id_tag)");
        foreach ($tagIds as $tagId) {
            $stmt->execute(['id_post' => $postId, 'id_tag' => $tagId]);
        }
    }

    public function attachTechsToPost($postId, $techIds)
    {
        $stmt = $this->db->prepare("INSERT INTO post_tech (id_post, id_tech) VALUES (:id_post, :id_tech)");
        foreach ($techIds as $techId) {
            $stmt->execute(['id_post' => $postId, 'id_tech' => $techId]);
        }
    }

    public function updatePost($postId, $title, $text, $tags, $techs) 
    {
        // Archive the posts before updating
        $this->archivePost($postId);

        // Update the post
        $stmt = $this->db->prepare("UPDATE post SET title = ?, text = ?, date_modified = NOW() WHERE id = ?");
        $stmt->execute([$title, $text, $postId]);

        // Update tags
        $this->db->prepare("DELETE FROM post_tag WHERE id_post = ?")->execute([$postId]);
        if (!empty($tags)) {
            $stmt = $this->db->prepare("INSERT INTO post_tag (id_post, id_tag) VALUES (?, ?)");
            foreach ($tags as $tagId) {
                $stmt->execute([$postId, $tagId]);
            }
        }

        // Update techs
        $this->db->prepare("DELETE FROM post_tech WHERE id_post = ?")->execute([$postId]);
        if (!empty($techs)) {
            $stmt = $this->db->prepare("INSERT INTO post_tech (id_post, id_tech) VALUES (?, ?)");
            foreach ($techs as $techId) {
                $stmt->execute([$postId, $techId]);
            }
        }
    }
    
    public function deletePost($postId) 
    {    
        $this->db->prepare("UPDATE post SET is_deleted = 1 WHERE id = ?")->execute([$postId]);
    }

    public function archivePost($postId)
    {
        $postImagePath = "uploads/posts/{$postId}/post.jpg";
        if (file_exists($postImagePath)) {
            $now = date('Y-m-d_H-i-s');
            $archivePath = "uploads/archived_posts/{$postId}/{$now}.jpg";
            if (!file_exists(dirname($archivePath))) {
                mkdir(dirname($archivePath), 0777, true);
            }
            rename($postImagePath, $archivePath);
        }

        $stmt = $this->db->prepare("SELECT id, id_user, title, text, date_created, date_modified FROM post WHERE id = ?");
        $stmt->execute([$postId]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            throw new Exception("Post introuvable.");
        }

        $stmt = $this->db->prepare("
            INSERT INTO post_archive (id_post, id_user, title, text, date_created, date_modified)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $post['id'],
            $post['id_user'],
            $post['title'],
            $post['text'],
            $post['date_created'],
            $post['date_modified']
        ]);
    }

    public function searchPosts($search = '', $tags = [], $techs = [], $sort = 'created_desc')
    {
        $query = "
            SELECT DISTINCT p.*, u.name AS author_name 
            FROM post p 
            JOIN user u ON p.id_user = u.id 
            LEFT JOIN post_tag pt ON p.id = pt.id_post 
            LEFT JOIN post_tech ptech ON p.id = ptech.id_post 
            WHERE p.is_deleted = 0
        ";
        
        $params = [];

        // Key words
        if (!empty($search)) {
            $query .= " AND (p.title LIKE :search OR p.text LIKE :search)";
            $params['search'] = "%$search%";
        }

        // Tags
        if (!empty($tags)) {
            $tags = array_map('intval', $tags);
            $placeholders = implode(',', array_fill(0, count($tags), '?'));
            $query .= " AND pt.id_tag IN ($placeholders)";
            $params = array_merge($params, $tags);
        }

        // Techs
        if (!empty($techs)) {
            $techs = array_map('intval', $techs);
            $placeholders = implode(',', array_fill(0, count($techs), '?'));
            $query .= " AND ptech.id_tech IN ($placeholders)";
            $params = array_merge($params, $techs);
        }

        // Sorting
        switch ($sort) {
            case 'likes_asc':
                $query .= " ORDER BY p.like_count ASC, p.date_created DESC";
                break;
            case 'likes_desc':
                $query .= " ORDER BY p.like_count DESC, p.date_created DESC";
                break;
            case 'created_asc':
                $query .= " ORDER BY p.date_created ASC";
                break;
            case 'created_desc':
                $query .= " ORDER BY p.date_created DESC";
                break;
            case 'modified_asc':
                $query .= " ORDER BY p.date_modified ASC";
                break;
            case 'modified_desc':
                $query .= " ORDER BY p.date_modified DESC";
                break;
            default:
                $query .= " ORDER BY p.date_created DESC";
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>