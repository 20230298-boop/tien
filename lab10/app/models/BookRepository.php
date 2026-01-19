<?php

class BookRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // ===============================
    // LẤY DANH SÁCH SÁCH + SEARCH + SORT
    // ===============================
    public function getAll(string $keyword, string $sort, string $dir): array {
        $sql = "SELECT * FROM books WHERE 1";

        $params = [];
        if ($keyword !== '') {
            $sql .= " AND (title LIKE :kw OR author LIKE :kw)";
            $params[':kw'] = '%' . $keyword . '%';
        }

        // sort & dir đã được whitelist ở Controller
        $sql .= " ORDER BY $sort $dir";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ===============================
    // THÊM SÁCH
    // ===============================
    public function create(string $title, string $author, float $price, int $qty): bool {
        $sql = "INSERT INTO books(title, author, price, qty)
                VALUES(:title, :author, :price, :qty)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title'  => $title,
            ':author' => $author,
            ':price'  => $price,
            ':qty'    => $qty
        ]);
    }

    // ===============================
    // TÌM SÁCH THEO ID
    // ===============================
    public function find(int $id): ?array {
        $sql = "SELECT * FROM books WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);

        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        return $book ?: null;
    }

    // ===============================
    // CẬP NHẬT SÁCH
    // ===============================
    public function update(
        int $id,
        string $title,
        string $author,
        float $price,
        int $qty
    ): bool {
        $sql = "UPDATE books
                SET title = :title,
                    author = :author,
                    price = :price,
                    qty = :qty
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'     => $id,
            ':title'  => $title,
            ':author' => $author,
            ':price'  => $price,
            ':qty'    => $qty
        ]);
    }

    // ===============================
    // XÓA SÁCH
    // ===============================
    public function delete(int $id): bool {
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // ===============================
    // SÁCH CÒN TỒN (DÙNG CHO MƯỢN)
    // ===============================
    public function getAvailableBooks(): array {
        $sql = "SELECT * FROM books WHERE qty > 0 ORDER BY title";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
