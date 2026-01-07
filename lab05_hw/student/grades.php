<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/data.php';
require_once __DIR__ . '/../includes/header.php';
require_login();
$code = current_student()['student_code'];
$grades = read_json('grades.json', []);
?>
<h4>Bảng điểm</h4>
<table class="table table-bordered">
<tr><th>Môn</th><th>Tổng</th></tr>
<?php foreach($grades as $g): if($g['student_code']===$code): ?>
<tr><td><?=$g['course_code']?></td><td><?=$g['total']?></td></tr>
<?php endif; endforeach; ?>
</table>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>