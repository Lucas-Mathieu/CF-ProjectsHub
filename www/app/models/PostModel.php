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

    public function createPost($userId, $title, $content)
    {
        $stmt = $this->db->prepare("
            INSERT INTO post (id_user, title, text, date_created, date_modified, like_count)
            VALUES (:id_user, :title, :text, NOW(), NOW(), 0)
        ");
        $stmt->execute([
            'id_user' => $userId,
            'title' => $title,
            'text' => $content
        ]);
    
        return $this->db->lastInsertId();
    }

    public function attachTagsToPost($postId, $tagIds)
    {
        $stmt = $this->db->prepare("INSERT INTO post_tag (id_post, id_tag) VALUES (:post_id, :tag_id)");
        foreach ($tagIds as $tagId) {
            $stmt->execute(['post_id' => $postId, 'tag_id' => $tagId]);
        }
    }

    public function attachTechsToPost($postId, $techIds)
    {
        $stmt = $this->db->prepare("INSERT INTO post_tech (id_post, id_tech) VALUES (:post_id, :tech_id)");
        foreach ($techIds as $techId) {
            $stmt->execute(['post_id' => $postId, 'tech_id' => $techId]);
        }
    }
}
?>