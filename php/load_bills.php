<?php
	if (isset($_SESSION['staff_id'])) {
		$staff_id = $_SESSION['staff_id'];
	}
	require_once('connection.php');
	$sql = "SELECT * FROM bills WHERE DATE(created_at) = CURRENT_DATE and staff_id='$staff_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td class="text-center">'. $i++ .'</td>
					<td>'.$row["cost"].'</td>
					<td>'.$row["note"].'</td>
					<td>'.$row["created_at"].'</td>
					<td>
						<a href="/php/delete_bill.php?id='.$row['id'].'" type="button" class="btn btn-danger del-btn">
							<span class="glyphicon glyphicon-trash"></span> Xóa
						</a>
					</td>
				</tr>
			';
		}
	}
?>