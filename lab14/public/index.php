<?php
require_once '../config/database.php';
require_once '../app/controllers/ProductController.php';

$controller = new ProductController($pdo);
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    default:
        $controller->index();
}
