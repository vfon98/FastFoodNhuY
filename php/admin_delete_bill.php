<?php
	session_start();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		if (isset($_SESSION['login_user']) && $_SESSION['login_role'] == 'admin') {
			require_once './connection.php';
			$sql = "DELETE FROM bills WHERE id='$id'";
			$conn->query($sql);
			header('location: /quanly/bills.php');
		}
	}
?>