<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function set_flash($key, $msg, $type = 'success') {
    $_SESSION['flash'][$key] = [
        'msg' => $msg,
        'type' => $type
    ];
}

function get_flash($key) {
    if (!empty($_SESSION['flash'][$key])) {
        $f = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $f;
    }
    return null;
}
