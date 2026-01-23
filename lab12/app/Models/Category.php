<?php
class Category {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll(string $q = ''): array {
        $stm = $this->db->prepare(
            "SELECT * FROM categories WHERE name LIKE ?"
        );
        $stm->execute(["%$q%"]);
        return $stm->fetchAll();
    }

    public function insert(string $name): bool {
        return $this->db
            ->prepare("INSERT INTO categories(name) VALUES(?)")
            ->execute([$name]);
    }
}
