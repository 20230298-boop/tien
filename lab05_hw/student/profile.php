<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/header.php';
require_login();
$s = current_student();
?>
<h4>Hồ sơ sinh viên</h4>
<ul class="list-group">
<li class="list-group-item">Mã SV: <?=$s['student_code']?></li>
<li class="list-group-item">Họ tên: <?=$s['full_name']?></li>
<li class="list-group-item">Lớp: <?=$s['class_name']?></li>
<li class="list-group-item">Email: <?=$s['email']?></li>
</ul>
<a class="btn btn-success mt-3" href="grades.php">Xem điểm</a>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>