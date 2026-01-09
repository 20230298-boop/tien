
<?php
if($_SERVER['REQUEST_METHOD']!=='POST'){echo "Không truy cập trực tiếp";exit;}
$total=$_POST['qty']*$_POST['price'];
$file="../data/invoices/invoice_".time().".json";
file_put_contents($file,json_encode($_POST));
?>
<h3>Tổng tiền: <?=$total?></h3>
