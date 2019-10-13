<?php
	session_start();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		if (isset($_SESSION['login_user']) && $_SESSION['login_role'] == 'staff') {
			require_once './connection.php';
			$sql = "DELETE FROM bills WHERE id='$id'";
			$conn->query($sql);
			header('location: /nhanvien/home.php');
		}
	}
?>