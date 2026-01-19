<?php
class Router {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function dispatch() {
        $c = $_GET['c'] ?? 'books';
        $a = $_GET['a'] ?? 'index';

        $controllerName = ucfirst($c) . 'Controller';
        $file = "../app/controllers/$controllerName.php";

        if (!file_exists($file)) {
            die("Controller không tồn tại");
        }

        require_once $file;
        $controller = new $controllerName($this->pdo);

        if (!method_exists($controller, $a)) {
            die("Action không tồn tại");
        }

        $controller->$a();
    }
}
