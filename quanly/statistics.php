<?php include './template/header.php'; ?>

<div class="container">
	<div class="col-md-12" align="center">
		<form id="stat-form" method="POST" class="form-inline" role="form">
			<legend style="font-size: 1.6em">Thống kê doanh thu</legend>
			<div class="form-group">
				<label for="sel1">Thống kê theo:</label>
				<select class="form-control" id="statType" onchange="handleChange()">
					<option>Ngày</option>
					<option>Từ Ngày - Đến Ngày</option>
					<option>Tháng</option>
				</select>
			</div>

			<div id="statDate" class="form-group range-div">
				<label for="">Chọn ngày</label>
				<input id="date" type="date" id="input" class="form-control">
			</div>

			<div id="statTwoDate" class="form-group range-div" style="display: none;">
				<label for="">Từ ngày</label>
				<input id="from-date" type="date" class="form-control">
				<label for="">&nbsp;Đến ngày</label>
				<input id="to-date" type="date" class="form-control">
			</div>

			<div id="statMonth" class="form-group range-div" style="display: none;">
				<label for="">Chọn tháng</label>
				<input id="month" type="month" class="form-control">
			</div>

			<div class="form-group">
				<label>Chi nhánh: </label>
				<select class="form-control" id="agency">
					<option>Nguyễn Văn Cừ</option>
					<option>Trần Văn Khéo</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary" style="margin: 10px 0">
				<span class="glyphicon glyphicon-stats"></span> Thống kê
			</button>
		</form>
		<hr>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Danh sách hóa đơn</h3>
				</div>
				<div class="panel-body">
					<table id="stat-table" class="table table-hover table-striped">
						<thead>
							<tr>
								<th class="text-center">STT</th>
								<th>Tổng tiền</th>
								<th>Ghi chú</th>
								<th>Thời gian</th>
								<th>Nhân viên</th>
								<th>Chi nhánh</th>
							</tr>
						</thead>
						<tbody id="result">
						</tbody>
					</table>
				</div>
			</div>
			<h1>Tổng doanh thu: <span id="total-revenue">0 VND</span></h1>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		if (location.pathname === '/quanly/statistics.php') {
			$('#nav-items').find('li.active').removeClass('active');
			$('#nav-items').find('li:nth-child(3)').addClass('active');
		}
	});
</script>
<script src="../js/statistics.js"></script>

<?php include './template/footer.php'; ?>