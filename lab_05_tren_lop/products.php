<?php
require_once 'includes/auth.php';
require_login();
require_once 'includes/products.php';
require_once 'includes/cart.php';
require_once 'includes/header.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
 cart_add((int)$_POST['id'],1);
 set_flash('success','Đã thêm vào giỏ');
 header('Location: products.php'); exit;
}
?>
<h3>Sản phẩm</h3>
<div class="row">
<?php foreach($products as $id=>$p): ?>
<div class="col-md-4">
<div class="card mb-3 p-3">
<h5><?=htmlspecialchars($p['name'])?></h5>
<p><?=number_format($p['price'])?> đ</p>
<form method="post">
<input type="hidden" name="id" value="<?=$id?>">
<button class="btn btn-sm btn-primary">Add</button>
</form>
</div>
</div>
<?php endforeach; ?>
</div>
<?php require_once 'includes/footer.php'; ?>
