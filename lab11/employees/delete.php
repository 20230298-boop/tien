<?php
require_once '../config/database.php';
require_once '../includes/flash.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("DELETE FROM employees WHERE id=?");
$stmt->execute([$id]);

set_flash('Employee deleted');
header('Location: index.php');
exit;
