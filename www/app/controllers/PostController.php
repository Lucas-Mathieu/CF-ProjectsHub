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
        $posts = $this->postModel->getAllPosts();

        $updatedPosts = [];

        foreach ($posts as $post) {
            $userId = $post['id_user'];
            $postId = $post['id'];

            $pfpPath = "uploads/pfps/{$userId}/avatar.jpg";
            if (!file_exists($pfpPath)) {
                $pfpPath = "uploads/pfps/0/avatar.jpg";
            }
            $post['author_pfp'] = $pfpPath;

            $postImagePath = "uploads/posts/{$postId}/post.jpg";
            $post['image'] = file_exists($postImagePath) ? $postImagePath : null;

            $updatedPosts[] = $post;
        }

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
    
        $userId = $post['id_user'];
        $postId = $post['id'];
    
        $baseUrl = "http://localhost/";
    
        // Get author's pfp
        $pfpPath = "uploads/pfps/{$userId}/avatar.jpg";
        if (!file_exists($pfpPath)) {
            $pfpPath = "uploads/pfps/0/avatar.jpg";
        }
        $post['author_pfp'] = $baseUrl . $pfpPath;
    
        // Get post image
        $postImagePath = "uploads/posts/{$postId}/post.jpg";
        $post['image'] = file_exists($postImagePath) ? $baseUrl . $postImagePath : null;
    
        // Get comments and replies
        $comments = $this->commentModel->getCommentsByPostId($postId);
    
        $updatedComments = [];
    
        // Add pfp for each comment
        foreach ($comments as &$comment) {
            $commentUserId = $comment['id_user'];
    
            // Commenter pfp
            $commentPfpPath = "uploads/pfps/{$commentUserId}/avatar.jpg";
            if (!file_exists($commentPfpPath)) {
                $commentPfpPath = "uploads/pfps/0/avatar.jpg";
            }
            $comment['commenter_pfp'] = $baseUrl . $commentPfpPath;
            
            // Add replies for this comment
            if (!empty($replies)) {
                foreach ($replies as &$reply) {
                    $replyUserId = $reply['id_user'];
                    $replyPfpPath = "uploads/pfps/{$replyUserId}/avatar.jpg";
                    if (!file_exists($replyPfpPath)) {
                        $replyPfpPath = "uploads/pfps/0/avatar.jpg";
                    }
                    $reply['commenter_pfp'] = $baseUrl . $replyPfpPath;
                }
                $comment['replies'] = $replies;
            }
    
            $updatedComments[] = $comment;
        }
    
        $comments = $updatedComments;
    
        require_once '../app/views/posts/post_detail.php';
    } 
}
?>