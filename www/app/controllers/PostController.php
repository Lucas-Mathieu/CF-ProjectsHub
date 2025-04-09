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
        $comments = $this->commentModel->getCommentsByPostId($postId);
        require_once '../app/views/posts/post_detail.php';
    }
}
?>