<?php
require_once 'Database.php';
class Category {
    public static function all() {
        $db = Database::connect();
        return $db->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
    }
}
