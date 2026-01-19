<?php require '../app/views/layout/header.php'; ?>

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">📚 Danh sách sách</h5>
    </div>

    <div class="card-body">
        <form class="row g-2 mb-3">
            <input type="hidden" name="c" value="books">
            <div class="col-md-6">
                <input class="form-control" name="kw"
                       placeholder="Tìm theo tên sách hoặc tác giả"
                       value="<?=htmlspecialchars($_GET['kw'] ?? '')?>">
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-primary">
                    <i class="bi bi-search"></i> Tìm kiếm
                </button>
                <a href="index.php?c=books&a=create" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Thêm sách
                </a>
            </div>
        </form>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-secondary">
                <tr>
                    <th>Tên sách</th>
                    <th>Tác giả</th>
                    <th>Giá</th>
                    <th>Tồn kho</th>
                    <th width="120">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($books as $b): ?>
                <tr>
                    <td><?=htmlspecialchars($b['title'])?></td>
                    <td><?=$b['author']?></td>
                    <td><?=number_format($b['price'])?></td>
                    <td><?=$b['qty']?></td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-warning"
                           href="index.php?c=books&a=edit&id=<?=$b['id']?>">✏️</a>
                        <form method="post"
                              action="index.php?c=books&a=delete"
                              style="display:inline"
                              onsubmit="return confirm('Bạn chắc chắn muốn xóa sách này?')">
                            <input type="hidden" name="id" value="<?=$b['id']?>">
                            <button class="btn btn-sm btn-danger">🗑</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
