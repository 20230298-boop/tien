<?php
require_once '../config/database.php';
require_once '../includes/flash.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM suppliers WHERE id = ?");
    $stmt->execute([$id]);

    set_flash('Xóa nhà cung cấp thành công');
}

header('Location: index.php');
exit;