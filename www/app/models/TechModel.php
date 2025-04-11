<?php
class TechModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAllTechs() {
        $stmt = $this->db->query("SELECT * FROM tech");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>