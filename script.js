$(document).ready(function() {
	var loginpassword = $("#pasword").html();
	$("#LogButton").click(function() {
		if (!$("#username").val()) {
			$("#errorcheckdiv").val("Please enter a valid username");
			$("#username").css("border", "1px solid red");
		}
		else {
			$("#errorcheckdiv").val("");
			$("#username").css("border", "1px solid gray");
			if (!$("#pasword").val()) {
				$("#errorcheckdiv").val("Please enter a valid password");
				$("#password").css("border", "1px solid red");
			}
			else {
				$("#errorcheckdiv").val("");
				$("#username").css("border", "1px solid gray");
				var username = $("#username").val();
				var passwrd = $("#password").val();
				var radiobtns = $("input[name='SecManButton']").val();
				var postdata = {login_username : `${username}`, login_password : `${passwrd}`, login_type : `${radiobtns}`};
				$.post("login.php", {login_username : `${username}`, login_password : `${passwrd}`, login_type : `${radiobtns}`})
					.done(function(data) {
						alert(data);
				});
			}
		}
	});
});

window.onload= function(){
	var logbtn = document.getElementById("LogButton")
	var username = document.getElementsByTagName("input")[0]
	var password = document.getElementsByTagName("input")[1]
	var res = document.getElementById("errorcheckdiv")

	logbtn.addEventListener("click", function() {
		if (username.value == "") {
			errorcheckdiv.innerHTML = "Please enter a valid username"
			username.style.border = '1px solid red'
		}
		else {
			errorcheckdiv.innterHTML = ""
			username.style.border = "1px solid gray"
			
		}

		if(password.value == "") {
			errorcheckdiv.innerHTML = "Please enter a valid password"
			password.style.border = '1px solid red'
		}
		else {
			errorcheckdiv.innterHTML = ""
			password.style.border = "1px solid gray"
		}
	});
}
