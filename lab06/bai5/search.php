
<?php
$kw=htmlspecialchars($_GET['kw']??'');
$data=json_decode(file_get_contents("../data/books.json"),true)??[];
?>
<form method="get">
<input name="kw" value="<?=$kw?>" placeholder="Từ khóa">
<button>Tìm</button>
</form>
<ul>
<?php foreach($data as $b):
 if($kw==''||str_contains($b['title'],$kw)): ?>
<li><?=htmlspecialchars($b['title'])?></li>
<?php endif; endforeach; ?>
</ul>
