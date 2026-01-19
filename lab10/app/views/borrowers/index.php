<?php require '../app/views/layout/header.php'; ?>

<div class="card shadow">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">👤 Danh sách người mượn</h5>
    </div>
    <div class="card-body">
        <a href="index.php?c=borrowers&a=create" class="btn btn-success mb-3">
            ➕ Thêm người mượn
        </a>

        <table class="table table-bordered">
            <tr class="table-secondary">
                <th>Họ tên</th>
                <th>Số điện thoại</th>
            </tr>
            <?php foreach($borrowers as $b): ?>
            <tr>
                <td><?=$b['full_name']?></td>
                <td><?=$b['phone']?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<?php require '../app/views/layout/footer.php'; ?>
