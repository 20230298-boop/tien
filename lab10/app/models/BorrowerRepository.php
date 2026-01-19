<?php
class BorrowerRepository {
    private PDO $db;

    // BẮT BUỘC type-hint PDO
    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM borrowers ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function create($fullName, $phone) {
        $stmt = $this->db->prepare(
            "INSERT INTO borrowers(full_name, phone) VALUES (?, ?)"
        );
        $stmt->execute([$fullName, $phone]);
    }
}
