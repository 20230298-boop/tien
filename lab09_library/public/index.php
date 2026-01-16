<?php
require_once __DIR__ . '/../config/database.php';

$c = $_GET['c'] ?? 'book';
$a = $_GET['a'] ?? 'index';

$controllerName = ucfirst($c) . 'Controller';
$controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';

if(!file_exists($controllerFile)){
    die("Controller not found: " . $controllerName);
}
require_once $controllerFile;

$controller = new $controllerName($db);

if(!method_exists($controller, $a)){
    die("Action not found: " . $a);
}
$controller->$a();
?>
