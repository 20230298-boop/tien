<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>LAB 12 – Admin Panel</title>
    <link rel="stylesheet" href="/lab12/public/assets/css/style.css">
</head>
<body>

<div class="container">

    <div class="navbar">
        <a href="index.php?c=category">📁 Categories</a>
        <a href="index.php?c=employee">👤 Employees</a>
        <a href="index.php?c=appointment">📅 Appointments</a>
    </div>

    <div class="card">
        <?= $content ?>
    </div>

    <div class="footer">
        LAB 12 – MVC CRUD © 2026
    </div>

</div>

</body>
</html>
