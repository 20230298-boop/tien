<?php
require_once '../config/database.php';
require_once '../includes/header.php';

$errors = [];
$full_name = $email = $phone = $position = '';
$salary = '';
$status = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $position = trim($_POST['position']);
    $salary = trim($_POST['salary']);
    $status = $_POST['status'] ?? 1;

    if (strlen($full_name) < 3)
        $errors['full_name'] = 'Full name phải ≥ 3 ký tự';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email'] = 'Email không hợp lệ';

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM employees WHERE email=?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0)
        $errors['email'] = 'Email đã tồn tại';

    if ($position === '')
        $errors['position'] = 'Position là bắt buộc';

    if ($salary !== '' && (!is_numeric($salary) || $salary < 0))
        $errors['salary'] = 'Salary phải ≥ 0';

    if (!in_array($status, ['0','1']))
        $errors['status'] = 'Status không hợp lệ';

    if (!$errors) {
        $stmt = $pdo->prepare(
            "INSERT INTO employees
            (full_name,email,phone,position,salary,status)
            VALUES (?,?,?,?,?,?)"
        );
        $stmt->execute([
            $full_name, $email, $phone, $position,
            $salary !== '' ? $salary : null, $status
        ]);

        set_flash('Thêm nhân viên thành công');
        header('Location: index.php');
        exit;
    }
}
?>

<h1>➕ Add Employee</h1>

<form method="post">
    <label>Full Name *</label>
    <input type="text" name="full_name" value="<?= htmlspecialchars($full_name) ?>">
    <div class="error"><?= $errors['full_name'] ?? '' ?></div>

    <label>Email *</label>
    <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
    <div class="error"><?= $errors['email'] ?? '' ?></div>

    <label>Phone</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($phone) ?>">

    <label>Position *</label>
    <input type="text" name="position" value="<?= htmlspecialchars($position) ?>">
    <div class="error"><?= $errors['position'] ?? '' ?></div>

    <label>Salary</label>
    <input type="text" name="salary" value="<?= htmlspecialchars($salary) ?>">
    <div class="error"><?= $errors['salary'] ?? '' ?></div>

    <label>Status</label>
    <select name="status">
        <option value="1" <?= $status==1?'selected':'' ?>>Active</option>
        <option value="0" <?= $status==0?'selected':'' ?>>Inactive</option>
    </select>

    <br><br>
    <button>Save</button>
    <a href="index.php" class="back">← Back</a>
</form>

<?php require_once '../includes/footer.php'; ?>
