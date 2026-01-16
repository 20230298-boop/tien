<?php
class BookModel {
    private $db;
    public function __construct($db){ $this->db = $db; }

    public function all(){
        return $this->db->query("SELECT * FROM books ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id){
        $st = $this->db->prepare("SELECT * FROM books WHERE id=?");
        $st->execute([$id]);
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    public function create($d){
        $sql = "INSERT INTO books(isbn,title,author,category,quantity)
                VALUES(?,?,?,?,?)";
        return $this->db->prepare($sql)
            ->execute([$d['isbn'],$d['title'],$d['author'],$d['category'],$d['quantity']]);
    }

    public function update($id,$d){
        $sql = "UPDATE books SET isbn=?,title=?,author=?,category=?,quantity=? WHERE id=?";
        return $this->db->prepare($sql)
            ->execute([$d['isbn'],$d['title'],$d['author'],$d['category'],$d['quantity'],$id]);
    }

    public function delete($id){
        return $this->db->prepare("DELETE FROM books WHERE id=?")->execute([$id]);
    }

    public function decreaseQty($id){
        return $this->db->prepare("UPDATE books SET quantity=quantity-1 WHERE id=? AND quantity>0")
            ->execute([$id]);
    }

    public function increaseQty($id){
        return $this->db->prepare("UPDATE books SET quantity=quantity+1 WHERE id=?")
            ->execute([$id]);
    }
}
?>
