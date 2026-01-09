
<?php
if($_SERVER['REQUEST_METHOD']!=='POST'){
 echo "Không truy cập trực tiếp <a href='register_member.php'>Quay lại</a>"; exit;
}
$name=htmlspecialchars($_POST['name']);
$email=htmlspecialchars($_POST['email']);
$phone=htmlspecialchars($_POST['phone']);
$dob=$_POST['dob'];
$f=fopen("../data/members.csv","a");
fputcsv($f,[$name,$email,$phone,$dob]);
fclose($f);
?>
<h3>Đăng ký thành công</h3>
<?=$name?> - <?=$email?> - <?=$phone?> - <?=$dob?>
