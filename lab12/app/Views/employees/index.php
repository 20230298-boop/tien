<?php require '../app/Views/layouts/header.php'; ?>
<?php require '../app/Views/layouts/sidebar.php'; ?>

<h2>Employees</h2>
<a class="btn" href="index.php?c=employee&a=create">+ Add</a>

<div class="card">
<table>
<tr>
  <th>ID</th><th>Name</th><th>Phone</th>
  <th>Position</th><th>Salary</th><th></th>
</tr>
<?php foreach($employees as $e): ?>
<tr>
<td><?= $e['id'] ?></td>
<td><?= htmlspecialchars($e['full_name']) ?></td>
<td><?= htmlspecialchars($e['phone']) ?></td>
<td><?= htmlspecialchars($e['position']) ?></td>
<td><?= number_format($e['salary']) ?></td>
<td>
<a class="btn" href="index.php?c=employee&a=edit&id=<?= $e['id'] ?>">Edit</a>
<a class="btn btn-danger"
onclick="return confirm('Delete?')"
href="index.php?c=employee&a=delete&id=<?= $e['id'] ?>">Delete</a>
</td>
</tr>
<?php endforeach ?>
</table>
</div>

<?php require '../app/Views/layouts/footer.php'; ?>
