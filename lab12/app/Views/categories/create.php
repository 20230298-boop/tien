<?php require '../app/Views/layouts/header.php'; ?>
<?php require '../app/Views/layouts/sidebar.php'; ?>

<h2>Add Category</h2>
<div class="card">
<?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
<form method="post">
<input name="name" placeholder="Category name">
<button class="btn">Save</button>
</form>
</div>

<?php require '../app/Views/layouts/footer.php'; ?>
