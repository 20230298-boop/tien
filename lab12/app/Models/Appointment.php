<?php
class Appointment {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function all(string $q='') {
        $stm = $this->db->prepare(
            "SELECT * FROM appointments
             WHERE customer_name LIKE ?"
        );
        $stm->execute(["%$q%"]);
        return $stm->fetchAll();
    }

    public function find($id) {
        $stm = $this->db->prepare("SELECT * FROM appointments WHERE id=?");
        $stm->execute([$id]);
        return $stm->fetch();
    }

    public function insert($name,$phone,$service,$time,$status) {
        return $this->db->prepare(
            "INSERT INTO appointments(customer_name,phone,service,appointment_time,status)
             VALUES(?,?,?,?,?)"
        )->execute([$name,$phone,$service,$time,$status]);
    }

    public function update($id,$name,$phone,$service,$time,$status) {
        return $this->db->prepare(
            "UPDATE appointments 
             SET customer_name=?, phone=?, service=?, appointment_time=?, status=?
             WHERE id=?"
        )->execute([$name,$phone,$service,$time,$status,$id]);
    }

    public function delete($id) {
        return $this->db
            ->prepare("DELETE FROM appointments WHERE id=?")
            ->execute([$id]);
    }
}
