<?php

class CommentModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=projecthub;charset=utf8mb4", "root", "");
    }

    public function getCommentsByPostId($postId)
    {
        $stmt = $this->db->prepare("
            SELECT post_comment.*, user.name AS commenter_name 
            FROM post_comment 
            JOIN user ON post_comment.id_user = user.id 
            WHERE id_post = :postId 
            ORDER BY date ASC
        ");
        $stmt->execute(['postId' => $postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>