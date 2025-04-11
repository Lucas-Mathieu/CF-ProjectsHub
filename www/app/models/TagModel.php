<?php
class TagModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAllTags() {
        $stmt = $this->db->query("SELECT * FROM tag");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>