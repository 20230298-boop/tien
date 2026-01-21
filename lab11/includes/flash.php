<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function set_flash($msg, $type = 'success') {
    $_SESSION['flash'] = ['msg' => $msg, 'type' => $type];
}

function show_flash() {
    if (!empty($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        echo "<div class='alert {$f['type']}'>{$f['msg']}</div>";
        unset($_SESSION['flash']);
    }
}
