<?php include './template/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm nhân viên</h3>
				</div>
				<div class="panel-body">
					<form action="../php/create_staff.php" method="POST" role="form">
						<div class="form-group">
							<label>Tên nhân viên</label>
							<input name="fullname" type="text" class="form-control" placeholder="Nhập tên" autofocus required>
						</div>
						<div class="form-group">
							<label>Tên tài khoản</label>
							<input name="username" type="text" class="form-control" placeholder="Nhập tài khoản" required>
						</div>
						<div class="form-group">
							<label>Mật khẩu</label>
							<input name="pass" minlength="4" type="password" class="form-control" placeholder="Ít nhất 4 ký tự"
							title="Password nhiều hơn 4 kí tự">
						</div>

						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Thêm NV </button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th class="text-center">STT</th>
						<th>Tên NV</th>
						<th>Tên tài khoản</th>
						<th>Ngày tạo</th>
						<th>Tùy chọn</th>
					</tr>
				</thead>
				<tbody>
					<?php require '../php/load_staffs.php'; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$('.del-btn').click(function(e) {
		if (!confirm('Xác nhận xóa ?')) {
			e.preventDefault();
		}

	});
</script>
<!-- Latest compiled and minified CSS & JS -->
<?php include './template/footer.php'; ?>