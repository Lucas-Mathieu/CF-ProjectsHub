<?php

class PostController
{
    private $postModel;
    private $commentModel;

    public function __construct($postModel, $commentModel)
    {
        $this->postModel = $postModel;
        $this->commentModel = $commentModel;
    }

    public function showPostsList()
    {
        // Fetch posts from the model
        $posts = $this->postModel->getAllPosts();
        $userId = $_SESSION['user']['id'] ?? null; // Get the current logged-in user id

        $updatedPosts = [];

        // Loop through each post
        foreach ($posts as $post) {
            $postId = $post['id'];
            $postUserId = $post['id_user'];

            // Get profile picture for the author of the post
            $pfpPath = "uploads/pfps/{$postUserId}/avatar.jpg";
            if (!file_exists($pfpPath)) {
                $pfpPath = "uploads/pfps/0/avatar.jpg";
            }
            $post['author_pfp'] = $pfpPath;

            // Get the image associated with the post
            $postImagePath = "uploads/posts/{$postId}/post.jpg";
            $post['image'] = file_exists($postImagePath) ? $postImagePath : null;

            // Check if the current user has liked the post
            $liked = false;
            if ($userId) {
                $stmt = $this->postModel->getLikeByUserAndPost($userId, $postId);
                if ($stmt) {
                    $liked = true;
                }
            }
            $post['liked'] = $liked; // Set the liked status

            // Format human-readable date
            $createdAt = new DateTime($post['date_created']);
            $post['created_at_human'] = $createdAt->format('d M Y, H:i');

            $updatedPosts[] = $post; // Add the post with updated information
        }

        // Pass the updated posts to the view
        $posts = $updatedPosts;

        require_once '../app/views/posts/posts.php';
    }

    public function showPostDetail($postId)
    {
        $post = $this->postModel->getPostById($postId);
        
        if (!$post) {
            $_SESSION['error'] = "Post not found.";
            header('Location: /posts');
            exit;
        }

        $userId = $_SESSION['user']['id'] ?? null; // Get the logged-in user ID

        // Base URL for profile and post images
        $baseUrl = "http://localhost/";

        // Get author's profile picture
        $pfpPath = "uploads/pfps/{$post['id_user']}/avatar.jpg";
        if (!file_exists($pfpPath)) {
            $pfpPath = "uploads/pfps/0/avatar.jpg";
        }
        $post['author_pfp'] = $baseUrl . $pfpPath;
    
        // Get post image
        $postImagePath = "uploads/posts/{$postId}/post.jpg";
        $post['image'] = file_exists($postImagePath) ? $baseUrl . $postImagePath : null;
    
        // Check if the logged-in user has liked the post
        $liked = false;
        if ($userId) {
            $stmt = $this->postModel->getLikeByUserAndPost($userId, $postId);
            if ($stmt) {
                $liked = true;
            }
        }
        $post['liked'] = $liked; // Set the liked status for the post

        // Format human-readable date
        $createdAt = new DateTime($post['date_created']);
        $post['created_at_human'] = $createdAt->format('d M Y, H:i');
    
        // Get comments for the post
        $comments = $this->commentModel->getCommentsByPostId($postId);
    
        $updatedComments = [];

        // Add pfp for each comment
        foreach ($comments as &$comment) {
            $commentUserId = $comment['id_user'];
    
            // Commenter's pfp
            $commentPfpPath = "uploads/pfps/{$commentUserId}/avatar.jpg";
            if (!file_exists($commentPfpPath)) {
                $commentPfpPath = "uploads/pfps/0/avatar.jpg";
            }
            $comment['commenter_pfp'] = $baseUrl . $commentPfpPath;
            
            $updatedComments[] = $comment; // Add updated comment
        }
    
        $comments = $updatedComments;

        // Pass post and comments to the view
        require_once '../app/views/posts/post_detail.php';
    }

    public function toggleLike()
    {
        if (!isset($_SESSION['user'])) {
            echo json_encode(['success' => false, 'error' => 'Non autorisé']);
            exit;
        }

        $postId = $_POST['post_id'];
        $userId = $_SESSION['user']['id'];

        // Check if the post is already liked by the user
        $stmt = $this->postModel->getLikeByUserAndPost($userId, $postId);
        if ($stmt) {
            // Remove like
            $this->postModel->removeLike($userId, $postId);
            $liked = false;
        } else {
            // Add like
            $this->postModel->addLike($userId, $postId);
            $liked = true;
        }

        $likeCount = $this->postModel->getLikesCount($postId);

        echo json_encode([
            'success' => true,
            'liked' => $liked,
            'like_count' => $likeCount
        ]);
        exit;
    }
}
?>