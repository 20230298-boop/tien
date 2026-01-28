<?php $flash = get_flash('msg'); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>📦 Danh sách sản phẩm</h1>
            <a href="?action=create" class="btn">+ Thêm mới</a>
        </div>

        <?php if ($flash): ?>
            <div class="alert <?= $flash['type'] ?>">
                <?= $flash['msg'] ?>
            </div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $p): ?>
                <tr>
                    <td>
                        <?php if ($p['image']): ?>
                            <img src="<?= $p['image'] ?>" class="avatar">
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td>
                        <span class="price">
                            <?= number_format($p['price']) ?> đ
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a class="<?= $i == $page ? 'active' : '' ?>"
               href="?page=<?= $i ?>">
               <?= $i ?>
            </a>
        <?php endfor; ?>
        </div>
    </div>
</div>
</body>
</html>
