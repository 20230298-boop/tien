
<?php
require_once "../app/core/Database.php";
$db = Database::getInstance();
$count = $db->query("SELECT COUNT(*) FROM students")->fetchColumn();
echo "Kết nối OK – Số SV: $count";
