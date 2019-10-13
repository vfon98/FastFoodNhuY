$(document).ready(function() {
	$('#re-pass').keyup(function() {
		checkPass();
	});
	$('#new-pass').keyup(function() {
		checkPass();
	});
	$('#btn-change-pass').click(function(e) {
		if (!confirm('Chắc chưa ?')) {
			e.preventDefault();
		}
	});
	$('#change-pass-form').submit(function(e) {
		e.preventDefault();
		let userId = $('#user-id').val();
		let newPass = $('#new-pass').val();
		console.log(userId, newPass);
		$.post('../php/change_pass.php', {
			userId: userId,
			newPass: newPass
		}, function(data) {
			console.log(data);
			$('#modal-id').modal('hide');
			alert('Đổi mật khẩu thành công');
			location.assign("../php/logout.php");
		});
	});
});

function checkPass() {
	let newPass = $('#new-pass').val();
	let rePass = $('#re-pass').val();
	if (newPass === rePass && newPass !== '') {
		$('#btn-change-pass').prop('disabled', false);
		$('#re-pass-div').removeClass('has-error').addClass('has-success');
	}
	else {
		$('#btn-change-pass').prop('disabled', true);
		$('#re-pass-div').addClass('has-error');
	}
}