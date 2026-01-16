<?php
class BorrowModel {
    private $db;
    public function __construct($db){ $this->db = $db; }

    public function all(){
        $sql = "SELECT b.id, m.full_name, bk.title, b.borrow_date, b.due_date, b.return_date, b.status
                FROM borrows b
                JOIN members m ON b.member_id=m.id
                JOIN books bk ON b.book_id=bk.id
                ORDER BY b.id DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($d){
        $sql = "INSERT INTO borrows(member_id,book_id,borrow_date,due_date)
                VALUES(?,?,?,?)";
        return $this->db->prepare($sql)
            ->execute([$d['member_id'],$d['book_id'],$d['borrow_date'],$d['due_date']]);
    }

    public function markReturn($id){
        $sql = "UPDATE borrows SET status='RETURNED', return_date=CURDATE() WHERE id=?";
        return $this->db->prepare($sql)->execute([$id]);
    }

    public function find($id){
        $st = $this->db->prepare("SELECT * FROM borrows WHERE id=?");
        $st->execute([$id]);
        return $st->fetch(PDO::FETCH_ASSOC);
    }
}
?>
