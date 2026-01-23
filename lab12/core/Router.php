<?php
class Router {
    public static function dispatch() {
        $c = $_GET['c'] ?? 'category';
        $a = $_GET['a'] ?? 'index';

        $controllerName = ucfirst($c) . 'Controller';
        require "../app/Controllers/$controllerName.php";

        $controller = new $controllerName();
        $controller->$a();
    }
}