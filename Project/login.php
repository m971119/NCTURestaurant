<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="login_styles.css">
</head>

<body style="background-color:black;">

<script>

	function checkform(){
		//evt.preventDefault();
		var myForm = document.loginform;
		var condition = true;

		if(myForm.eacc.value==""){
			alert("請輸入帳號");
			myForm.eacc.focus();
			condition = false;
		}
		
		else if(myForm.epw.value==""){
			alert("請輸入密碼");
			myForm.epw.focus();
			condition=false;
		}
		
		if(condition == false) return false;
		else return true;
	}


</script>


<div>
<h1>Login</h1>
	<form onsubmit="return checkform()" action="login_after.php" method="post" name="loginform">
	<label>帳號: </label><br>
	<input type="text" name="eacc"><br>
	<label>密碼: </label><br>
	<input type="password" name="epw"><br><br>
	<input type="submit">

	</form>
	<a href="register.php">
	<button>註冊</button>
	</a>

</div>

</body>
</html>

