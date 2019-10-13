<?php
	require_once('connection.php');
	$sql = "SELECT * FROM users WHERE role='staff'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td class="text-center">'. $i++ .'</td>
					<td>'.$row["name"].'</td>
					<td>'.$row["username"].'</td>
					<td>'.$row["created_at"].'</td>
					<td>
						<a href="/php/admin_delete_staff.php?id='.$row['id'].'" class="btn btn-danger del-btn">
							<span class="glyphicon glyphicon-trash"></span> Xóa
						</a>
					</td>
				</tr>
			';
		}
	}
?>