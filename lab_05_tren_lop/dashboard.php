<?php
require_once 'includes/auth.php';
require_login();
require_once 'includes/header.php';
?>
<h4>Xin chào <?=htmlspecialchars($_SESSION['user']['username'])?></h4>
<p>Role: <?=htmlspecialchars($_SESSION['user']['role'])?></p>
<a href="products.php" class="btn btn-success">Products</a>
<a href="cart.php" class="btn btn-warning">Cart</a>
<?php require_once 'includes/footer.php'; ?>
