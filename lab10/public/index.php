<?php
require_once '../app/config/db.php';
require_once '../app/core/Router.php';

$router = new Router($pdo);
$router->dispatch();
