<?php require '../app/Views/layouts/header.php'; ?>
<?php require '../app/Views/layouts/sidebar.php'; ?>

<h2>Edit Appointment</h2>

<form method="post">
<input name="customer_name" value="<?= htmlspecialchars($appointment['customer_name']) ?>"><br><br>
<input name="phone" value="<?= htmlspecialchars($appointment['phone']) ?>"><br><br>
<input name="service" value="<?= htmlspecialchars($appointment['service']) ?>"><br><br>
<input type="datetime-local" name="appointment_time"
value="<?= date('Y-m-d\TH:i', strtotime($appointment['appointment_time'])) ?>"><br><br>
<select name="status">
<?php foreach(['Pending','Confirmed','Done','Cancel'] as $s): ?>
<option <?= $appointment['status']==$s?'selected':'' ?>><?= $s ?></option>
<?php endforeach ?>
</select><br><br>
<button class="btn">Update</button>
</form>

<?php require '../app/Views/layouts/footer.php'; ?>
