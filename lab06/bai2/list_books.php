
<?php
$file="../data/books.json";
$books=json_decode(file_get_contents($file),true)??[];
if($_SERVER['REQUEST_METHOD']==='POST'){
 $books[]=['id'=>$_POST['id'],'title'=>$_POST['title'],'qty'=>$_POST['qty']];
 file_put_contents($file,json_encode($books,JSON_PRETTY_PRINT));
}
?>
<table border=1>
<tr><th>Mã</th><th>Tên</th><th>SL</th></tr>
<?php foreach($books as $b): ?>
<tr>
<td><?=htmlspecialchars($b['id'])?></td>
<td><?=htmlspecialchars($b['title'])?></td>
<td><?=$b['qty']?></td>
</tr>
<?php endforeach; ?>
</table>
