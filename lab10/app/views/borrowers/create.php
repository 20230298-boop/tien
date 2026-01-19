<?php require '../app/views/layout/header.php'; ?>

<div class="card shadow">
    <div class="card-header bg-success text-white">
        <h5>➕ Thêm người mượn</h5>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?c=borrowers&a=store">
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input class="form-control" name="full_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input class="form-control" name="phone">
            </div>
            <button class="btn btn-success">💾 Lưu</button>
            <a href="index.php?c=borrowers" class="btn btn-secondary">⬅ Quay lại</a>
        </form>
    </div>
</div>

<?php require '../app/views/layout/footer.php'; ?>
