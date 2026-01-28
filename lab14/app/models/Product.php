<?php
class Product {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function countAll(): int {
        return (int)$this->pdo
            ->query("SELECT COUNT(*) FROM products")
            ->fetchColumn();
    }

    public function getPage(int $limit, int $offset): array {
        $sql = "SELECT * FROM products
                ORDER BY id DESC
                LIMIT :l OFFSET :o";
        $st = $this->pdo->prepare($sql);
        $st->bindValue(':l', $limit, PDO::PARAM_INT);
        $st->bindValue(':o', $offset, PDO::PARAM_INT);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): void {
        $sql = "INSERT INTO products(name, price, image)
                VALUES (?, ?, ?)";
        $this->pdo->prepare($sql)->execute($data);
    }
}
