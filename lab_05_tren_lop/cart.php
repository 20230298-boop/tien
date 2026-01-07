<?php
require_once 'includes/auth.php';
require_login();
require_once 'includes/products.php';
require_once 'includes/cart.php';
require_once 'includes/header.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
 foreach($_POST['qty']??[] as $id=>$q){
  cart_update((int)$id,(int)$q);
 }
 if(isset($_POST['clear'])) cart_clear();
 set_flash('success','Đã cập nhật giỏ');
 header('Location: cart.php'); exit;
}
$cart=$_SESSION['cart']??[];
?>
<h3>Giỏ hàng</h3>
<form method="post">
<table class="table">
<tr><th>Sản phẩm</th><th>SL</th></tr>
<?php foreach($cart as $id=>$q): ?>
<tr>
<td><?=htmlspecialchars($products[$id]['name'])?></td>
<td><input type="number" name="qty[<?=$id?>]" value="<?=$q?>" min="0"></td>
</tr>
<?php endforeach; ?>
</table>
<button class="btn btn-success">Update</button>
<button name="clear" class="btn btn-danger">Clear</button>
</form>
<?php require_once 'includes/footer.php'; ?>
