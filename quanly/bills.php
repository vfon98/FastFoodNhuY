<?php include './template/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h1 class="panel-title text-center" style="font-size: 3rem">Danh sách hóa đơn</h1>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th class="text-center">STT</th>
							<th>Tổng tiền</th>
							<th>Ghi chú</th>
							<th>Thời gian</th>
							<th>Nhân viên</th>
							<th>Chi nhánh</th>
							<th>Tùy chọn</th>
						</tr>
					</thead>
					<tbody>
						<?php require '../php/admin_load_bills.php'; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$('.del-btn').click(function(e) {
		if (!confirm('Xác nhận xóa ?')) {
			e.preventDefault();
		}

	});
	$(document).ready(function() {
		if (location.pathname === '/quanly/bills.php') {
			$('#nav-items').find('li.active').removeClass('active');
			$('#nav-items').find('li:nth-child(2)').addClass('active');
		}
	});
</script>
<?php include './template/footer.php'; ?>