<?php $error = $error ?? ''; ?>
<?php require '../app/Views/layouts/header.php'; ?>
<?php require '../app/Views/layouts/sidebar.php'; ?>

<h2>Add Employee</h2>
<?php if($error): ?><p class="error"><?= $error ?></p><?php endif ?>

<form method="post">
<input name="full_name" placeholder="Full name"><br><br>
<input name="phone" placeholder="Phone"><br><br>
<input name="position" placeholder="Position"><br><br>
<input name="salary" type="number" placeholder="Salary"><br><br>
<button class="btn">Save</button>
</form>
<?php if (!empty($error)): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<?php require '../app/Views/layouts/footer.php'; ?>
