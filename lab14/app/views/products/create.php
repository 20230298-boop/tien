<?php $flash = get_flash('msg'); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h1>➕ Thêm sản phẩm</h1>

        <?php if ($flash): ?>
            <div class="alert <?= $flash['type'] ?>">
                <?= $flash['msg'] ?>
            </div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data" class="form">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" required>

            <label>Giá</label>
            <input type="number" name="price" required>

            <label>Ảnh</label>
            <input type="file" name="image">

            <button class="btn">Lưu</button>
        </form>
    </div>
</div>
</body>
</html>
