<?php
	if (isset($_POST['userId']) && isset($_POST['newPass'])) {
		$user_id = $_POST['userId'];
		$new_pass = md5($_POST['newPass']);
		$sql = "UPDATE users SET password='$new_pass' WHERE id='$user_id'";
		require_once 'connection.php';
		$conn->query($sql);
	}
?>