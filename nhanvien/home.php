<?php
session_start();
if (!(isset($_SESSION['login_user']) && $_SESSION['login_role'] == 'staff')) {
	header('location: ./index.php');
}
$staff_id = $_SESSION['staff_id'];
$cur_user = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhân viên</title>
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
		body {
			font-size: 16px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">Fast Food Như Ý</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Thêm Hóa Đơn</a></li>
				<!-- <li><a href="#">Page 2</a></li> -->
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="#">  Xin chào, Vphong ! <span class="glyphicon glyphicon-user"></span></a></li>
					<li><a href="#"> Đăng Xuất <span class="glyphicon glyphicon-off"></span></a></li> -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user"></span> Chào bạn, <b><?php echo $cur_user ?></b> ! <b class="caret"></b>
						</a>
						<ul class="dropdown-menu" style="font-size: 1em">
							<li><a href="../php/logout.php"><span class="glyphicon glyphicon-off" style="color: red"></span>&nbsp; Đăng xuất</a></li>
							<li><a data-toggle="modal" href="#modal-id"><span class="glyphicon glyphicon-wrench"></span>&nbsp; Đổi mật khẩu</a></li>
						</ul>
					</li>
				</ul>

				<!-- MODAL -->
				<div class="modal fade" id="modal-id">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Đổi mật khẩu</h4>
							</div>
							<div class="modal-body">
								<form id="change-pass-form" role="form">
									<div class="form-group">
										<label>Mật khẩu mới</label>
										<input type="password" class="form-control" id="new-pass" placeholder="Tối thiểu 4 ký tự" minlength="4" autofocus>
									</div>
									<div id="re-pass-div" class="form-group has-feedback">
										<label>Nhập lại khẩu mới</label>
										<input type="password" class="form-control" id="re-pass" placeholder="Tối thiểu 4 ký tự" minlength="4">
									</div>
									<!-- USER ID - HIDDEN FIELD -->
									<input type="hidden" id="user-id" name="staff_id" value="<?php echo $_SESSION['staff_id'] ?>">
									<button type="submit" id="btn-change-pass" class="btn btn-primary" disabled>Đổi mật khẩu</button>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
							</div>
						</div>
					</div>
				</div>
				<!-- END MODAL -->
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Thêm hóa đơn</h3>
						</div>
						<div class="panel-body">
							<form action="../php/create_bill.php" method="POST" role="form">
								<div class="form-group">
									<label for="">Tổng tiền (Đơn vị K)</label>
									<div class="input-group">
										<input name="cost" type="number" step="1" min="0" max="1000" class="form-control" id="" value="10">
										<span class="input-group-addon">K</span>
									</div>
								</div>
							<!-- <div class="form-group">
								<label for="">Ghi chú</label>
								<textarea name="note" class="form-control" cols="20" rows="5" placeholder="Ghi chú đơn hàng ..."></textarea>
							</div> -->
							<div class="form-group">
								<div class="checkbox">
									<label><input name="details[]" type="checkbox" value="Gà rán">Gà rán</label>
								</div>
								<div class="checkbox">
									<label><input name="details[]" type="checkbox" value="Khoai Lắc">Khoai Lắc</label>
								</div>
								<div class="checkbox">
									<label><input name="details[]" type="checkbox" value="Bắp Lắc">Bắp Lắc</label>
								</div>
								<div class="checkbox">
									<label><input name="details[]" type="checkbox" value="Phô mai que">Phô mai que</label>
								</div>
								<div class="checkbox">
									<label><input name="details[]" type="checkbox" value="Xúc xích">Xúc xích</label>
								</div>
							</div>

							<input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-plus"></span> Thêm hóa đơn
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title text-center" style="font-size: 3rem">Hóa đơn hôm nay</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th class="text-center">STT</th>
									<th>Tổng tiền</th>
									<th>Ghi chú</th>
									<th>Thời gian</th>
									<th>Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								<?php require '../php/load_bills.php'; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Latest compiled and minified CSS & JS -->
	<!-- <script src="//code.jquery.com/jquery.js"></script> -->
	<script src="../js/change_pass.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script>
		$('.del-btn').click(function(e) {
			if (!confirm("Chắc chưa ?")) {
				e.preventDefault();
			}

		});
	</script>
</body>
</html>