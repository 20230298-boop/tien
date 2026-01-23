<?php $error = $error ?? ''; ?>
<?php require '../app/Views/layouts/header.php'; ?>
<?php require '../app/Views/layouts/sidebar.php'; ?>

<h2>Add Appointment</h2>
<?php if($error): ?><p class="error"><?= $error ?></p><?php endif ?>

<form method="post">
<input name="customer_name" placeholder="Customer name"><br><br>
<input name="phone" placeholder="Phone"><br><br>
<input name="service" placeholder="Service"><br><br>
<input type="datetime-local" name="appointment_time"><br><br>
<select name="status">
<option>Pending</option>
<option>Confirmed</option>
<option>Done</option>
<option>Cancel</option>
</select><br><br>
<button class="btn">Save</button>
</form>
<?php if (!empty($error)): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>
<?php require '../app/Views/layouts/footer.php'; ?>
