<?php
	if (isset($_POST['type'])) {
		$type = $_POST['type'];
		$agency = $_POST['agency'];
		require_once './connection.php';
		if ($type == 0) {
			$date = $_POST['date'];
			// $sql = "SELECT * FROM bills WHERE DATE(created_at) = '$date'";
			$sql = "SELECT b.id, b.cost, b.note, b.created_at, u.name, u.username, b.agency 
				FROM bills b  JOIN users u ON b.staff_id = u.id 
				WHERE DATE(b.created_at) = '$date' AND agency='$agency' 
				ORDER BY created_at DESC";
		}
		else if ($type == 1) {
			$from_date = $_POST['fromDate'];
			$to_date = $_POST['toDate'];
			$sql = "SELECT b.id, b.cost, b.note, b.created_at, u.name, u.username, b.agency 
				FROM bills b  JOIN users u ON b.staff_id = u.id 
				WHERE DATE(b.created_at) BETWEEN '$from_date' AND '$to_date' 
				AND agency='$agency'
				ORDER BY created_at DESC";
		}
		else if ($type == 2) {
			$month = $_POST['month'];
			$sql = "SELECT b.id, b.cost, b.note, b.created_at, u.name, u.username, b.agency 
				FROM bills b  JOIN users u ON b.staff_id = u.id 
				WHERE MONTH(b.created_at) = MONTH('".$month."-28')
					AND YEAR(b.created_at) = YEAR('".$month."-28')
					AND agency='$agency'
				ORDER BY created_at DESC";
				echo $sql;
		}
		$result = $conn->query($sql);
		$i = 1;
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '
					<tr>
						<td class="text-center">'. $i++ .'</td>
						<td>'.$row["cost"].'</td>
						<td>'.$row["note"].'</td>
						<td>'.$row["created_at"].'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["agency"].'</td>
					</tr>
				';
			}
		}
		else {
			echo '<tr>
					<td colspan="6"><h1 class="text-danger text-center">Không có kết quả !</h1></td>
				</tr>';
		}
	}
?>