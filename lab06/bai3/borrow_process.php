
<?php
if($_SERVER['REQUEST_METHOD']!=='POST'){echo "Không truy cập trực tiếp";exit;}
$data=json_decode(file_get_contents("../data/borrows.json"),true);
$data[]=['member'=>$_POST['member'],'book'=>$_POST['book'],'status'=>'Đang mượn'];
file_put_contents("../data/borrows.json",json_encode($data,JSON_PRETTY_PRINT));
echo "Mượn thành công";
