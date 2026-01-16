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
<title>Borrows</title>
<link rel="stylesheet" href="public/css/style.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<h2>🔁 Borrow / Return</h2>

<form id="borrowForm" class="card">
<input name="member_id" placeholder="Member ID" required>
<input name="book_id" placeholder="Book ID" required>
<input type="date" name="borrow_date" required>
<input type="date" name="due_date" required>
<button>Borrow</button>
</form>

<table>
<thead>
<tr><th>#</th><th>Member</th><th>Book</th><th>Borrow</th><th>Due</th><th>Return</th><th>Status</th><th>Action</th></tr>
</thead>
<tbody id="data"></tbody>
</table>

<script src="public/js/borrows.js"></script>
</body>
</html>
