
<h2>Quản lý sinh viên</h2>

<div class="card">
<form id="studentForm">
<input type="hidden" name="id">

<div class="form-group">
<label>Mã SV</label>
<input name="code">
<div class="error" id="err-code"></div>
</div>

<div class="form-group">
<label>Họ tên</label>
<input name="full_name">
<div class="error" id="err-full_name"></div>
</div>

<div class="form-group">
<label>Email</label>
<input name="email">
<div class="error" id="err-email"></div>
</div>

<div class="form-group">
<label>Ngày sinh</label>
<input type="date" name="dob">
</div>

<button class="btn-save">Lưu</button>
<button type="reset" class="btn-reset">Nhập lại</button>
</form>
</div>

<div class="card">
<table>
<thead>
<tr>
<th>STT</th><th>Mã SV</th><th>Họ tên</th><th>Email</th><th>Ngày sinh</th><th>Thao tác</th>
</tr>
</thead>
<tbody id="data"></tbody>
</table>
</div>
