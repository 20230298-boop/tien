
<h3>Add Book</h3>
<form method="post" action="index.php?c=books&a=store">
 <input name="title" class="form-control mb-2" placeholder="Title" required>
 <input name="author" class="form-control mb-2" placeholder="Author" required>
 <input name="price" type="number" step="0.01" class="form-control mb-2">
 <input name="qty" type="number" class="form-control mb-2">
 <button class="btn btn-success">Save</button>
</form>
