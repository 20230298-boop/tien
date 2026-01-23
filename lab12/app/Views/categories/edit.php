<?php require '../app/Views/layouts/header.php'; ?>
<?php require '../app/Views/layouts/sidebar.php'; ?>

<h2>Edit Category</h2>
<div class="card">
<form method="post">
<input name="name" value="<?= htmlspecialchars($category['name']) ?>">
<button class="btn">Update</button>
</form>
</div>

<?php require '../app/Views/layouts/footer.php'; ?>