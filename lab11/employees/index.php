<?php
require_once '../config/database.php';
require_once '../includes/header.php';

$q = $_GET['q'] ?? '';

$stmt = $pdo->prepare(
    "SELECT * FROM employees
     WHERE full_name LIKE :q OR email LIKE :q
     ORDER BY id DESC"
);
$stmt->execute(['q' => "%$q%"]);
$data = $stmt->fetchAll();
?>

<h1>👨‍💼 Employee Management</h1>

<form class="search">
    <input type="text" name="q" placeholder="Search name or email..."
           value="<?= htmlspecialchars($q) ?>">
    <button>Search</button>
    <a href="create.php" class="btn btn-add">➕ Add Employee</a>
</form>

<table>
<tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Position</th>
    <th>Salary</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php foreach ($data as $e): ?>
<tr>
<td><?= $e['id'] ?></td>
<td><?= htmlspecialchars($e['full_name']) ?></td>
<td><?= htmlspecialchars($e['email']) ?></td>
<td><?= htmlspecialchars($e['position']) ?></td>
<td><?= number_format($e['salary']) ?></td>
<td>
    <span class="badge <?= $e['status'] ? 'active' : 'inactive' ?>">
        <?= $e['status'] ? 'Active' : 'Inactive' ?>
    </span>
</td>
<td>
    <a href="edit.php?id=<?= $e['id'] ?>" class="btn btn-edit">✏</a>
    <a href="delete.php?id=<?= $e['id'] ?>"
       class="btn btn-delete"
       onclick="return confirm('Delete this employee?')">🗑</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<?php require_once '../includes/footer.php'; ?>
