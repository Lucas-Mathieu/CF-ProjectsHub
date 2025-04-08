<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        // Update with your real DB credentials
        $this->db = new PDO('mysql:host=localhost;dbname=projecthub;charset=utf8', 'root', '');
    }

    // Get user by email
    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new user
    public function createUser($name, $email, $password)
    {
        $stmt = $this->db->prepare('INSERT INTO user (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $password]);
    }

    // Get user by ID
    public function getUserById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>