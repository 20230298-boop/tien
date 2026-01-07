<?php
require_once __DIR__ . '/includes/data.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $students = read_json('students.json', []);
    foreach ($students as $s) {
        if ($s['student_code'] === $_POST['student_code']
            && password_verify($_POST['password'], $s['password_hash'])) {
            $_SESSION['auth'] = true;
            $_SESSION['student'] = $s;
            header('Location: student/profile.php');
            exit;
        }
    }
    $error = 'Sai mã SV hoặc mật khẩu';
}
?>
<!DOCTYPE html><html><body class="bg-light">
<div class="container col-md-4 mt-5">
<h3 class="mb-3">Login</h3>
<form method="post">
<input class="form-control mb-2" name="student_code" placeholder="Student code">
<input class="form-control mb-2" type="password" name="password" placeholder="Password">
<button class="btn btn-primary w-100">Login</button>
</form>
<p class="text-danger mt-2"><?=htmlspecialchars($error)?></p>
</div>
</body></html>