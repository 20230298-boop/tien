<?php
class BorrowRepository {
    private PDO $db;

    // BẮT BUỘC type-hint PDO
    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }
}
