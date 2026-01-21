<?php
require_once '../config/database.php';
require_once '../includes/header.php';

$keyword = $_GET['q'] ?? '';

$sql = "SELECT * FROM categories 
        WHERE name LIKE :kw OR slug LIKE :kw
        ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute(['kw' => "%$keyword%"]);
$data = $stmt->fetchAll();
?>

<form class="search">
    <input type="text" name="q" placeholder="Tìm theo name hoặc slug..."
           value="<?= htmlspecialchars($keyword) ?>">
    <button>Tìm</button>
    <h1>📁 Category Management</h1>
    <a href="create.php" class="btn btn-add">+ Thêm mới</a>
</form>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Slug</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php foreach ($data as $row): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['slug']) ?></td>
<td><?= $row['status'] ? 'Active' : 'Inactive' ?></td>
<td>
    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">✏ Edit</a>
    <a href="delete.php?id=<?= $row['id'] ?>"
       class="btn btn-delete"
       onclick="return confirm('Xóa danh mục này?')">🗑 Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<?php require_once '../includes/footer.php'; ?>
