<?php
	if (isset($_POST)) {
		require_once './connection.php';
		$sql = "INSERT INTO users (name, username, password) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sss", $fullname, $username, $pass);

		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$pass = md5($_POST['pass']);
		
		$stmt->execute();
		header('location: /quanly/home.php');
	}
?>