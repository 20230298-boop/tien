
<?php
require_once __DIR__ . '/../core/Database.php';

class StudentModel {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function all() {
        return $this->db->query("SELECT * FROM students ORDER BY id DESC")->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function existsCodeEmail($code, $email, $id = null) {
        $sql = "SELECT COUNT(*) FROM students WHERE (code=? OR email=?)";
        $params = [$code, $email];
        if ($id) {
            $sql .= " AND id<>?";
            $params[] = $id;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }

    public function create($data) {
        $sql = "INSERT INTO students(code, full_name, email, dob)
                VALUES (:code,:full_name,:email,:dob)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE students SET code=:code, full_name=:full_name,
                email=:email, dob=:dob WHERE id=:id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM students WHERE id=?");
        return $stmt->execute([$id]);
    }
}
