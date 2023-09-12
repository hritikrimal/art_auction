$(document).on("click", "#log", function (e) {
	e.preventDefault();
	var username = $("#username").val();
	var password = $("#password").val();
	// alert(username);
	if (username == "") {
		alert("Username is required.");
		return false;
	}
	if (password == "") {
		alert("Password is required.");
		return false;
	}

	$.ajax({
		url: "admin/login",
		dataType: "json",
		type: "post",
		data: {
			username: username,
			password: password,
		},
		success: function (response) {
			if (response.success) {
				window.location.href = response.url;
				console.log(response);
			} else {
				alert(response.message);
			}
		},
	});
});
