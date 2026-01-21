<?php
require_once '../config/database.php';
require_once '../includes/header.php';

$errors = [];
$name = $slug = $description = '';
$status = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $slug = trim($_POST['slug']);
    $description = trim($_POST['description']);
    $status = $_POST['status'] ?? 1;

    if (strlen($name) < 3 || strlen($name) > 100)
        $errors['name'] = 'Tên từ 3–100 ký tự';

    if (!preg_match('/^[a-z0-9-]+$/', $slug))
        $errors['slug'] = 'Slug chỉ gồm a-z, 0-9, -';

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE slug=?");
    $stmt->execute([$slug]);
    if ($stmt->fetchColumn() > 0)
        $errors['slug'] = 'Slug đã tồn tại';

    if (!in_array($status, ['0','1']))
        $errors['status'] = 'Status không hợp lệ';

    if (!$errors) {
        $stmt = $pdo->prepare(
            "INSERT INTO categories(name,slug,description,status)
             VALUES (?,?,?,?)"
        );
        $stmt->execute([$name,$slug,$description,$status]);
        set_flash('Thêm danh mục thành công');
        header('Location: index.php');
        exit;
    }
}
?>

<form method="post">
<label>Name</label>
<input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
<div class="error"><?= $errors['name'] ?? '' ?></div>

<label>Slug</label>
<input type="text" name="slug" value="<?= htmlspecialchars($slug) ?>">
<div class="error"><?= $errors['slug'] ?? '' ?></div>

<label>Description</label>
<textarea name="description"><?= htmlspecialchars($description) ?></textarea>

<label>Status</label>
<select name="status">
    <option value="1" <?= $status==1?'selected':'' ?>>Active</option>
    <option value="0" <?= $status==0?'selected':'' ?>>Inactive</option>
</select>

<br><br>
<button>Save</button>
<a href="index.php">Back</a>
</form>

<?php require_once '../includes/footer.php'; ?>
