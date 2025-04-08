<?php

require_once __DIR__ . '/../../core/Database.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = database::getConnection();
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

    // Update user profile
    public function updateUserProfile($id, $name, $email)
    {
        $stmt = $this->db->prepare('UPDATE user SET name = ?, email = ? WHERE id = ?');
        $stmt->execute([$name, $email, $id]);
    }

    // Change user password
    public function changeUserPassword($id, $newPassword)
    {
        $stmt = $this->db->prepare('UPDATE user SET password = ? WHERE id = ?');
        $stmt->execute([password_hash($newPassword, PASSWORD_DEFAULT), $id]);
    }

    // Delete user account
    public function deleteUser($id)
    {
        $stmt = $this->db->prepare('DELETE FROM user WHERE id = ?');
        $stmt->execute([$id]);
    }
}
?>