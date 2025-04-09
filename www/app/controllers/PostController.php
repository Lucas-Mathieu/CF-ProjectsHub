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