<?php
session_start();
if (!(isset($_SESSION['login_user']) && $_SESSION['login_role'] == 'admin')) {
	header('location: ./index.php');
}
$staff_id = $_SESSION['staff_id'];
$cur_user = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/admin_page.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- Tip: You can replace the smoothness theme with any of the below themes:
	
	black-tie, blitzer, cupertino, dark-hive, dot-luv, eggplant, excite-bike, flick,
	hot-sneaks, humanity, le-frog, mint-choc, overcast,pepper-grinder, redmond, smoothness,
	south-street, start, sunny, swanky-purse, trontastic, ui-darkness, ui-lightness, and vader.
	
	ex: <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/cupertino/jquery-ui.min.css" />
	-->
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
			<ul class="nav navbar-nav" id="nav-items">
				<li class="active"><a href="/quanly/home.php">Danh sách nhân viên</a></li>
				<li><a href="./bills.php">Danh sách hóa đơn</a></li>
				<li><a href="./statistics.php">Thống kê doanh thu</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-user"></span> <b><?php echo $cur_user; ?></b> ! <b class="caret"></b>
					</a>
					<ul class="dropdown-menu" style="font-size: 1em">
						<li>
							<a href="/php/logout.php"><span class="glyphicon glyphicon-off" style="color: red"></span>&nbsp; Đăng xuất</a>
						</li>
						<li>
							<a  data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-wrench"></span>&nbsp; Đổi mật khẩu</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
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