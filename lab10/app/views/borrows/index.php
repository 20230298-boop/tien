<?php require '../app/views/layout/header.php'; ?>

<div class="card shadow">
    <div class="card-header bg-warning">
        <h5 class="mb-0">📝 Danh sách phiếu mượn</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr class="table-secondary">
                <th>Mã phiếu</th>
                <th>Người mượn</th>
                <th>Ngày mượn</th>
                <th>Chi tiết</th>
            </tr>
            <?php foreach($borrows as $b): ?>
            <tr>
                <td>#<?=$b['id']?></td>
                <td><?=$b['full_name']?></td>
                <td><?=$b['borrow_date']?></td>
                <td>
                    <a class="btn btn-sm btn-info"
                       href="index.php?c=borrows&a=show&id=<?=$b['id']?>">
                        👁 Xem
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<?php require '../app/views/layout/footer.php'; ?>