<?php
	session_start();
	if (isset($_POST)) {
		require_once './connection.php';
		$sql = "INSERT INTO bills (cost, note, staff_id, agency) VALUES (?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssss", $cost, $note, $staff_id, $agency);

		$cost = $_POST['cost'] * 1e3;
		$note = '';
		foreach ($_POST['details'] as $detail) {
			if ($detail != end($_POST['details'])) {
				$note .= $detail . ", ";
			}
			else {
				$note .= $detail;
			}
		}
		$staff_id = $_POST['staff_id'];
		$agency = $_SESSION['agency'];

		$stmt->execute();
		header('location: /nhanvien/home.php');
	}
?>