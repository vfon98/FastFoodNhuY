<?php
	require_once('connection.php');
	$sql = "SELECT b.id, b.cost, b.note, b.created_at, u.name, u.username, b.agency 
			FROM bills b JOIN users u ON b.staff_id = u.id ORDER BY created_at DESC";
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
					<td>'.$row["name"].'</td>
					<td>'.$row["agency"].'</td>
					<td>
						<a href="/php/admin_delete_bill.php?id='.$row['id'].'" type="button" class="btn btn-danger del-btn">
							<span class="glyphicon glyphicon-trash"></span> Xóa
						</a>
					</td>
				</tr>
			';
		}
	}
?>