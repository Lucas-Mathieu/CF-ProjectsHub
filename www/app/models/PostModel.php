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
}
?>