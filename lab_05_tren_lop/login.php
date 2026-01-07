<?php
require_once 'includes/auth.php';
require_once 'includes/flash.php';
require_once 'includes/users.php';
$error='';
$remember=$_COOKIE['remember_username']??'';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $u=trim($_POST['username']??'');
 $p=$_POST['password']??'';
 if($u===''||$p==='') $error='Thiếu thông tin';
 elseif(!empty($users[$u])&&password_verify($p,$users[$u]['hash'])){
   $_SESSION['auth']=true;
   $_SESSION['user']=['username'=>$u,'role'=>$users[$u]['role']];
   if(!empty($_POST['remember'])) setcookie('remember_username',$u,time()+7*86400,'/');
   set_flash('success','Đăng nhập thành công');
   header('Location: dashboard.php'); exit;
 } else $error='Sai tài khoản';
}
?>
<!doctype html><html><head>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Login</title></head>
<body class="bg-light">
<div class="container mt-5 col-md-4">
<h3 class="text-center">Login</h3>
<?php if($error): ?><div class="alert alert-danger"><?=$error?></div><?php endif; ?>
<form method="post" class="card p-4 shadow">
<input class="form-control mb-3" name="username" value="<?=htmlspecialchars($remember)?>" placeholder="Username">
<input type="password" class="form-control mb-3" name="password" placeholder="Password">
<div class="form-check mb-3">
<input type="checkbox" class="form-check-input" name="remember" id="r">
<label for="r" class="form-check-label">Remember me</label>
</div>
<button class="btn btn-primary w-100">Login</button>
</form>
</div></body></html>
