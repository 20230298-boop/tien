<h2>Appointments</h2>

<a class="btn btn-success" href="index.php?c=appointment&a=create">+ Add</a>

<table>
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Service</th>
        <th>Time</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php foreach ($appointments as $a): ?>
    <tr>
        <td><?= htmlspecialchars($a['id']) ?></td>
        <td><?= htmlspecialchars($a['customer_name']) ?></td>
        <td><?= htmlspecialchars($a['service']) ?></td>
        <td><?= htmlspecialchars($a['appointment_time']) ?></td>
        <td>
            <span class="badge <?= strtolower($a['status']) ?>">
                <?= htmlspecialchars($a['status']) ?>
            </span>
        </td>
        <td>
            <a class="btn" href="index.php?c=appointment&a=edit&id=<?= $a['id'] ?>">Edit</a>
            <a class="btn btn-danger"
               onclick="return confirm('Delete this appointment?')"
               href="index.php?c=appointment&a=delete&id=<?= $a['id'] ?>">
               Delete
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
