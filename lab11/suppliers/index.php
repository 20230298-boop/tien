<?php
require_once '../config/database.php';
require_once '../includes/header.php';

$q = $_GET['q'] ?? '';

$stmt = $pdo->prepare(
    "SELECT * FROM suppliers
     WHERE supplier_name LIKE :q
        OR tax_code LIKE :q
        OR phone LIKE :q
     ORDER BY id DESC"
);
$stmt->execute(['q' => "%$q%"]);
$data = $stmt->fetchAll();
?>

<h1>🏭 Supplier Management</h1>

<form class="search">
    <input type="text" name="q"
           placeholder="Search name, tax code or phone..."
           value="<?= htmlspecialchars($q) ?>">
    <button>Search</button>
    <a href="create.php" class="btn btn-add">➕ Add Supplier</a>
</form>

<table>
<tr>
    <th>ID</th>
    <th>Supplier Name</th>
    <th>Tax Code</th>
    <th>Phone</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php foreach ($data as $s): ?>
<tr>
<td><?= $s['id'] ?></td>
<td><?= htmlspecialchars($s['supplier_name']) ?></td>
<td><?= htmlspecialchars($s['tax_code']) ?></td>
<td><?= htmlspecialchars($s['phone']) ?></td>
<td>
    <span class="badge <?= $s['status'] ? 'active' : 'inactive' ?>">
        <?= $s['status'] ? 'Active' : 'Inactive' ?>
    </span>
</td>
<td>
    <a href="edit.php?id=<?= $s['id'] ?>" class="btn btn-edit">✏</a>
    <a href="delete.php?id=<?= $s['id'] ?>"
       class="btn btn-delete"
       onclick="return confirm('Delete this supplier?')">🗑</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<?php require_once '../includes/footer.php'; ?>
