
<?php if (!empty($_SESSION['success'])): ?>
<div class="alert alert-success">
    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
</div>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
<div class="alert alert-danger">
    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
</div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống Quản lý Thư viện</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            📚 Thư viện Mini
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?c=books">📖 Sách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?c=borrowers">👤 Người mượn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?c=borrows">📝 Phiếu mượn</a>
                </li>
            </ul>
            <a href="index.php?c=borrows&a=create" class="btn btn-warning">
                ➕ Lập phiếu mượn
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">
