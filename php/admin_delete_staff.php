<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM users WHERE id='$id'";
		require_once './connection.php';
		$conn->query($sql);
		header('location: /quanly/home.php');
	}
?>