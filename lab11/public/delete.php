<?php
require_once '../config/database.php';
require_once '../includes/flash.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT id FROM categories WHERE id = ?");
$stmt->execute([$id]);

if ($stmt->fetch()) {
    $del = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $del->execute([$id]);
    set_flash('Xóa danh mục thành công');
} else {
    set_flash('Danh mục không tồn tại', 'error');
}

header('Location: index.php');
exit;
