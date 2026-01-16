
<div class="header">
  <h1>📚 Library Management System</h1>
  <p>Lab 09 – PDO • MVC • jQuery Ajax</p>
</div>

<div class="nav">
  <a href="index.php?c=book">Books</a>
  <a href="index.php?c=member">Members</a>
  <a href="index.php?c=borrow">Borrows</a>
</div>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Books</title>
<link rel="stylesheet" href="public/css/style.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<h2>📚 Books</h2>
<form id="bookForm" class="card">
<input type="hidden" name="id">
<input name="isbn" placeholder="ISBN" required>
<input name="title" placeholder="Title" required>
<input name="author" placeholder="Author" required>
<input name="category" placeholder="Category">
<input type="number" name="quantity" min="0" placeholder="Quantity" required>
<button>Save</button>
</form>

<table>
<thead><tr><th>#</th><th>ISBN</th><th>Title</th><th>Author</th><th>Qty</th><th>Action</th></tr></thead>
<tbody id="data"></tbody>
</table>

<script src="public/js/books.js"></script>
</body>
</html>
