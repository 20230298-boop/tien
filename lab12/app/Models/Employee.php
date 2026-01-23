<?php
class Employee {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function all(string $q = ''): array {
        $stm = $this->db->prepare(
            "SELECT * FROM employees 
             WHERE full_name LIKE ? OR phone LIKE ?"
        );
        $stm->execute(["%$q%", "%$q%"]);
        return $stm->fetchAll();
    }

    public function find(int $id) {
        $stm = $this->db->prepare("SELECT * FROM employees WHERE id=?");
        $stm->execute([$id]);
        return $stm->fetch();
    }

    public function insert($name,$phone,$position,$salary) {
        return $this->db->prepare(
            "INSERT INTO employees(full_name,phone,position,salary)
             VALUES(?,?,?,?)"
        )->execute([$name,$phone,$position,$salary]);
    }

    public function update($id,$name,$phone,$position,$salary) {
        return $this->db->prepare(
            "UPDATE employees 
             SET full_name=?, phone=?, position=?, salary=? 
             WHERE id=?"
        )->execute([$name,$phone,$position,$salary,$id]);
    }

    public function delete($id) {
        return $this->db
            ->prepare("DELETE FROM employees WHERE id=?")
            ->execute([$id]);
    }
}
