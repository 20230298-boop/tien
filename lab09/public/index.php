
<?php
$c = $_GET['c'] ?? 'student';
$a = $_GET['a'] ?? 'index';
$controllerName = ucfirst($c).'Controller';
require_once "../app/controllers/$controllerName.php";
$controller = new $controllerName();
$controller->$a();
