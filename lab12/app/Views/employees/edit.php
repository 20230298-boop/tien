<?php require '../app/Views/layouts/header.php'; ?>
<?php require '../app/Views/layouts/sidebar.php'; ?>

<h2>Edit Employee</h2>

<form method="post">
<input name="full_name" value="<?= htmlspecialchars($employee['full_name']) ?>"><br><br>
<input name="phone" value="<?= htmlspecialchars($employee['phone']) ?>"><br><br>
<input name="position" value="<?= htmlspecialchars($employee['position']) ?>"><br><br>
<input name="salary" type="number" value="<?= $employee['salary'] ?>"><br><br>
<button class="btn">Update</button>
</form>

<?php require '../app/Views/layouts/footer.php'; ?>