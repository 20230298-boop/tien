<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH . '/app/config/database.php';
require_once ROOT_PATH . '/app/core/Router.php';
$db = (new Database())->connect();
$router = new Router($db);
$router->get('/', 'ProductController@index');
$router->get('/products', 'ProductController@index');
$router->get('/customers', 'CustomerController@index');
$router->get('/orders', 'OrderController@index');
$router->get('/api/products/search', 'ProductController@search');
$router->post('/api/products/delete', 'ProductController@delete');
$router->get('/api/customers/search', 'CustomerController@search');
$router->post('/api/customers/delete', 'CustomerController@delete');
$router->get('/api/orders/search', 'OrderController@search');
$router->post('/api/orders/cancel', 'OrderController@cancel');
$router->dispatch();
