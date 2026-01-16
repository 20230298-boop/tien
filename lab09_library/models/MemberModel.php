<?php
class MemberModel {
    private $db;
    public function __construct($db){ $this->db = $db; }

    public function all(){
        return $this->db->query("SELECT * FROM members ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id){
        $st = $this->db->prepare("SELECT * FROM members WHERE id=?");
        $st->execute([$id]);
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    public function create($d){
        $sql = "INSERT INTO members(member_code,full_name,email,phone)
                VALUES(?,?,?,?)";
        return $this->db->prepare($sql)
            ->execute([$d['member_code'],$d['full_name'],$d['email'],$d['phone']]);
    }

    public function update($id,$d){
        $sql = "UPDATE members SET member_code=?,full_name=?,email=?,phone=? WHERE id=?";
        return $this->db->prepare($sql)
            ->execute([$d['member_code'],$d['full_name'],$d['email'],$d['phone'],$id]);
    }

    public function delete($id){
        return $this->db->prepare("DELETE FROM members WHERE id=?")->execute([$id]);
    }
}
?>
