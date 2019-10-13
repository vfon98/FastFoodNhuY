<?php
	$host = 'localhost';
	$username = 'id10360249_khoailac_nhuy';
	$pass = 'khoailacnhuy';
	$db = 'id10360249_khoailac_nhuy';

	if ($_SERVER['SERVER_NAME'] == 'localhost') {
		$host = 'localhost';
		$username = 'root';
		$pass = '';
		$db = 'khoailac_nhuy';
	}

	$conn = new mysqli($host, $username, $pass, $db);
	if ($conn->connect_error) {
		die('Connection failed');
	}
	$conn->set_charset('utf8');
?>