<?php
require_once '../config/database.php';
require_once '../includes/header.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM suppliers WHERE id = ?");
$stmt->execute([$id]);
$supplier = $stmt->fetch();

if (!$supplier) {
    echo "<p>Supplier not found</p>";
    exit;
}

$errors = [];
$supplier_name = $supplier['supplier_name'];
$tax_code = $supplier['tax_code'];
$contact_name = $supplier['contact_name'];
$phone = $supplier['phone'];
$address = $supplier['address'];
$status = $supplier['status'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supplier_name = trim($_POST['supplier_name']);
    $tax_code = trim($_POST['tax_code']);
    $contact_name = trim($_POST['contact_name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $status = $_POST['status'] ?? 1;

    // Validate supplier_name
    if (strlen($supplier_name) < 3 || strlen($supplier_name) > 120) {
        $errors['supplier_name'] = 'Supplier name từ 3–120 ký tự';
    }

    // Validate unique tax_code (trừ chính nó)
    if ($tax_code !== '') {
        $stmt = $pdo->prepare(
            "SELECT COUNT(*) FROM suppliers WHERE tax_code = ? AND id != ?"
        );
        $stmt->execute([$tax_code, $id]);
        if ($stmt->fetchColumn() > 0) {
            $errors['tax_code'] = 'Tax code đã tồn tại';
        }
    }

    // Validate phone
    if ($phone !== '' && (!ctype_digit($phone) || strlen($phone) < 9 || strlen($phone) > 12)) {
        $errors['phone'] = 'Phone phải là số, 9–12 ký tự';
    }

    // Validate status
    if (!in_array($status, ['0', '1'])) {
        $errors['status'] = 'Status không hợp lệ';
    }

    // Update
    if (!$errors) {
        $stmt = $pdo->prepare(
            "UPDATE suppliers SET
                supplier_name = ?,
                tax_code = ?,
                contact_name = ?,
                phone = ?,
                address = ?,
                status = ?
             WHERE id = ?"
        );
        $stmt->execute([
            $supplier_name,
            $tax_code ?: null,
            $contact_name,
            $phone,
            $address,
            $status,
            $id
        ]);

        set_flash('Cập nhật nhà cung cấp thành công');
        header('Location: index.php');
        exit;
    }
}
?>

<h1>✏ Edit Supplier</h1>

<form method="post">
    <label>Supplier Name *</label>
    <input type="text" name="supplier_name"
           value="<?= htmlspecialchars($supplier_name) ?>">
    <div class="error"><?= $errors['supplier_name'] ?? '' ?></div>

    <label>Tax Code</label>
    <input type="text" name="tax_code"
           value="<?= htmlspecialchars($tax_code) ?>">
    <div class="error"><?= $errors['tax_code'] ?? '' ?></div>

    <label>Contact Name</label>
    <input type="text" name="contact_name"
           value="<?= htmlspecialchars($contact_name) ?>">

    <label>Phone</label>
    <input type="text" name="phone"
           value="<?= htmlspecialchars($phone) ?>">
    <div class="error"><?= $errors['phone'] ?? '' ?></div>

    <label>Address</label>
    <input type="text" name="address"
           value="<?= htmlspecialchars($address) ?>">

    <label>Status</label>
    <select name="status">
        <option value="1" <?= $status==1?'selected':'' ?>>Active</option>
        <option value="0" <?= $status==0?'selected':'' ?>>Inactive</option>
    </select>

    <br><br>
    <button>Update</button>
    <a href="index.php" class="back">← Back</a>
</form>

<?php require_once '../includes/footer.php'; ?>
