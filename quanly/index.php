<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
function validate($data)
{
	$data = trim($data);
	$data = strip_tags($data);
	$data = addslashes($data);
	return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta name="google-site-verification" content="U8gGd-WBAvsNgoBe7zlBEPK-puZrSecolLdJIOpNYuQ" /> -->
	<meta name="description" content="Đăng nhập ngay">
	<meta name="author" content="Vphong">
	<title>Đăng nhập</title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/login.css">
</head>
<body>
	<div id="container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return checkForm()">
			<h1>Quản lý</h1>
			<input class="info" id="user" type="text" name="usr" placeholder="Username" autofocus="autofocus">
			<div id="user-warning" class="alert"></div> <br>
			<input class="info" id="pass" type="password" name="pass" placeholder="Password">
			<div id="pass-warning" class="alert"></div>
			<?php 
			if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit-btn'])) {
				require_once('../php/connection.php');
				$usr = validate($_POST['usr']);
				$pass = md5($_POST['pass']);
				$sql = "SELECT id FROM users WHERE username = '$usr' AND password = '$pass' AND role='admin'";
				$result = $conn->query($sql);
				$conn->close();
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$_SESSION['login_user'] = $usr;
					$_SESSION['login_role'] = 'admin';
					$_SESSION['staff_id'] = $row['id'];
					header("location:./home.php");
				}
				else {
					echo '<p class="alert">Sai tài khoản hoặc mật khẩu !</p>';
				}
			}
			?>
			<input type="submit" value="Đăng nhập" name="submit-btn">
		</form>
		<a href="/" id="home-link"><i class="fa fa-home"></i> Trang chủ</a>
	</div>
	<p id="author">Author: V.Phong</p>
	<script src="/js/validate.js"></script>
</body>
</html>