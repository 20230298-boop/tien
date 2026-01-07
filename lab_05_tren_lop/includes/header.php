<?php
require_once __DIR__.'/auth.php';
require_once __DIR__.'/flash.php';
require_once __DIR__.'/csrf.php';
?>
<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<title>Shop Demo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
 <div class="container">
  <a class="navbar-brand" href="dashboard.php">Shop Demo</a>
  <?php if(is_logged_in()): ?>
  <form method="post" action="logout.php">
    <input type="hidden" name="csrf" value="<?=htmlspecialchars(csrf_token())?>">
    <button class="btn btn-sm btn-outline-light">Logout</button>
  </form>
  <?php endif; ?>
 </div>
</nav>
<div class="container mt-4">
<?php if($m=get_flash('success')): ?>
<div class="alert alert-success"><?=$m?></div>
<?php endif; ?>
<?php if($m=get_flash('info')): ?>
<div class="alert alert-info"><?=$m?></div>
<?php endif; ?>
