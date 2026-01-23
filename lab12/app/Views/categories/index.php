<?php require '../app/Views/layouts/header.php'; ?>
<?php require '../app/Views/layouts/sidebar.php'; ?>

<h2>Danh mục sản phẩm</h2>

<div class="card">
<table>
<tr>
  <th>ID</th>
  <th>Tên</th>
</tr>
<?php foreach ($categories as $c): ?>
<tr>
  <td><?= $c['id'] ?></td>
  <td><?= htmlspecialchars($c['name']) ?></td>
</tr>
<?php endforeach; ?>
</table>
</div>

<?php require '../app/Views/layouts/footer.php'; ?>
