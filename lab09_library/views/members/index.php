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
<title>Members</title>
<link rel="stylesheet" href="public/css/style.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<h2>👥 Members</h2>
<form id="memberForm" class="card">
<input type="hidden" name="id">
<input name="member_code" placeholder="Code" required>
<input name="full_name" placeholder="Full name" required>
<input name="email" placeholder="Email" required>
<input name="phone" placeholder="Phone">
<button>Save</button>
</form>

<table>
<thead><tr><th>#</th><th>Code</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr></thead>
<tbody id="data"></tbody>
</table>

<script src="public/js/members.js"></script>
</body>
</html>
