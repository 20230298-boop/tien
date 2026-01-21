<?php
require_once '../config/database.php';
require_once '../includes/header.php';

$id = $_GET['id'] ?? 0;

// Lấy dữ liệu cũ
$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$category = $stmt->fetch();

if (!$category) {
    set_flash('Danh mục không tồn tại', 'error');
    header('Location: index.php');
    exit;
}

$errors = [];
$name = $category['name'];
$slug = $category['slug'];
$description = $category['description'];
$status = $category['status'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $slug = trim($_POST['slug']);
    $description = trim($_POST['description']);
    $status = $_POST['status'] ?? 1;

    // Validate name
    if (strlen($name) < 3 || strlen($name) > 100) {
        $errors['name'] = 'Tên từ 3–100 ký tự';
    }

    // Validate slug
    if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
        $errors['slug'] = 'Slug chỉ gồm a-z, 0-9 và dấu -';
    }

    // Unique slug (trừ chính nó)
    $stmt = $pdo->prepare(
        "SELECT COUNT(*) FROM categories WHERE slug = ? AND id != ?"
    );
    $stmt->execute([$slug, $id]);
    if ($stmt->fetchColumn() > 0) {
        $errors['slug'] = 'Slug đã tồn tại';
    }

    // Validate status
    if (!in_array($status, ['0', '1'])) {
        $errors['status'] = 'Status không hợp lệ';
    }

    // Nếu không lỗi → update
    if (!$errors) {
        $stmt = $pdo->prepare(
            "UPDATE categories
             SET name = ?, slug = ?, description = ?, status = ?, updated_at = NOW()
             WHERE id = ?"
        );
        $stmt->execute([$name, $slug, $description, $status, $id]);

        set_flash('Cập nhật danh mục thành công');
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
        <option value="1" <?= $status == 1 ? 'selected' : '' ?>>Active</option>
        <option value="0" <?= $status == 0 ? 'selected' : '' ?>>Inactive</option>
    </select>

    <br><br>
    <button>Update</button>
    <a href="index.php">Back</a>
</form>

<?php require_once '../includes/footer.php'; ?>
