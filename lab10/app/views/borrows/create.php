<?php require '../app/views/layout/header.php'; ?>

<div class="card shadow">
    <div class="card-header bg-warning">
        <h5 class="mb-0">📝 Lập phiếu mượn sách</h5>
    </div>

    <div class="card-body">
        <form method="post" action="index.php?c=borrows&a=store">

            <!-- Người mượn -->
            <div class="mb-3">
                <label class="form-label fw-bold">Người mượn</label>
                <select name="borrower_id" class="form-select" required>
                    <option value="">-- Chọn người mượn --</option>
                    <?php foreach ($borrowers as $br): ?>
                        <option value="<?=$br['id']?>">
                            <?=$br['full_name']?> (<?=$br['phone']?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Ngày mượn -->
            <div class="mb-3">
                <label class="form-label fw-bold">Ngày mượn</label>
                <input type="date" name="borrow_date"
                       class="form-control"
                       value="<?=date('Y-m-d')?>"
                       required>
            </div>

            <!-- Ghi chú -->
            <div class="mb-3">
                <label class="form-label">Ghi chú</label>
                <textarea name="note" class="form-control"
                          placeholder="Ghi chú thêm (nếu có)"></textarea>
            </div>

            <hr>

            <!-- Danh sách sách -->
            <h6 class="fw-bold">📚 Danh sách sách mượn</h6>

            <table class="table table-bordered align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>Sách</th>
                        <th width="120">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $b): ?>
                    <tr>
                        <td>
                            <?=$b['title']?> – Tồn kho: <?=$b['qty']?>
                            <input type="hidden" name="book_id[]" value="<?=$b['id']?>">
                        </td>
                        <td>
                            <input type="number"
                                   name="qty[]"
                                   class="form-control"
                                   min="0"
                                   value="0">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-end">
                <button class="btn btn-success">
                    💾 Lưu phiếu mượn
                </button>
                <a href="index.php?c=borrows" class="btn btn-secondary">
                    ⬅ Quay lại
                </a>
            </div>
        </form>
    </div>
</div>

<?php require '../app/views/layout/footer.php'; ?>