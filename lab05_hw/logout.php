<?php
require_once __DIR__ . '/includes/csrf.php';
session_start();
if ($_SERVER['REQUEST_METHOD']==='POST' && csrf_verify($_POST['csrf']??'')) {
    session_destroy();
}
header('Location: login.php');
?>