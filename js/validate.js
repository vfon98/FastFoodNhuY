function checkForm() {
	var user = document.getElementById('user');
	var pass = document.getElementById('pass');
	var userWarnig = document.getElementById('user-warning');
	var passWarning = document.getElementById('pass-warning');
	var isValid = true;
	if (user.value == "") {
		isValid = false;
		userWarnig.innerHTML = "Bạn chưa nhập tài khoản !";
	}
	else {
		userWarnig.innerHTML = "";
	}

	if (pass.value == "") {
		isValid = false;
		passWarning.innerHTML = "Bạn chưa nhập mật khẩu !"
	}
	else {
		passWarning.innerHTML = "";
	}
	return isValid;
}
