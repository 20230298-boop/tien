<?php
// Kết nối CSDL bằng PDO – KHÔNG dùng root
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=lab10_library;charset=utf8mb4",
        "lab10_user",
        "123456",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    // Không hiển thị lỗi SQL ra giao diện
    error_log($e->getMessage());
    die("Không thể kết nối CSDL");
}
