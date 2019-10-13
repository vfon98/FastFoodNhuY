var statType = 0;
$(document).ready(function() {
	$('#stat-form').submit(function(e) {
		e.preventDefault();
		var agency = $('#agency').val();
		// console.log(agency);
		switch (statType) {
			case 0:
				let date = $('#date').val();
				getStatsByDate(date, agency);
				break;
			case 1:
				let fromDate = $('#from-date').val();
				let toDate = $('#to-date').val();
				getStatsByTwoDate(fromDate, toDate, agency);
				break;
			case 2:
				let month = $('#month').val();
				getStatsByMonth(month, agency);
				break;
		}
	})
});

function getStatsByDate(date, agency) {
	console.log(date);
	$.post('../php/get_statistics.php', {
		type: statType,
		date: date,
		agency: agency
	}, function(data) {
		$('#result').html(data);
		getTotalRevenue();
	});
}

function getStatsByTwoDate(fromDate, toDate, agency) {
	$.post('../php/get_statistics.php', {
		type: statType,
		fromDate: fromDate,
		toDate: toDate,
		agency: agency
	}, function(data) {
		$('#result').html(data);
		getTotalRevenue();
	});
}

function getStatsByMonth(month, agency) {
	$.post('../php/get_statistics.php', {
		type: statType,
		month: month,
		agency: agency
	}, function(data) {
		$('#result').html(data);
		getTotalRevenue();
	});
}


function handleChange() {
	statType = $('#statType')[0].selectedIndex;
	console.log(statType);
	let rangeDiv = $('.range-div');
	for(var i = 0; i < rangeDiv.length; i++) {
		if (i === statType) {
			rangeDiv[i].style.display = '';
		}
		else {
			rangeDiv[i].style.display = 'none';
		}
	}
}

function getTotalRevenue() {
	var table = document.getElementById('stat-table');;
	var sumVal = 0;

	for(var i = 1; i < table.rows.length; i++) {
		sumVal = sumVal + parseInt(table.rows[i].cells[1].innerHTML);
	}
	$('#total-revenue').html(sumVal.toLocaleString() + " VND");
}