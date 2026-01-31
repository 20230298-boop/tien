<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab 15 Topic 1</title>
<link rel="stylesheet" href="/lab15/public/assets/css/style.css">
</head>
<body>
<div class="container">
<h2>Danh sách danh mục</h2>
<table>
<tr><th>ID</th><th>Tên</th></tr>
<?php foreach($categories as $c): ?>
<tr><td><?= $c['id'] ?></td><td><?= $c['name'] ?></td></tr>
<?php endforeach; ?>
</table>
</div>
</body>
</html>
