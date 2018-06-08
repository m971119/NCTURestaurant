﻿<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="login_styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body style="background-color:black;">
<script>
	function checkform(){
		//evt.preventDefault();
		var myForm = document.regform;
		var condition = true;
		
		if(myForm.ename.value==""){
			alert("請輸入個人暱稱");
			myForm.ename.focus();
			condition = false;
		}
		else if(myForm.eacc.value==""){
			alert("請輸入帳號");
			myForm.eacc.focus();
			condition = false;
		}
		else if(myForm.epw.value==""){
			alert("請輸入密碼");
			myForm.epw.focus();
			condition=false;
		}
		else if(myForm.epw_check.value==""){
			alert("請輸入確認密碼");
			myForm.epw_check.focus();
			condition=false;
		}
		else if(myForm.epw.value!=myForm.epw_check.value){
			alert("確認密碼不相符");
			myForm.epw_check.focus();
			condition=false;
		}
		else if(myForm.emngr.value==""){
			alert("請選擇身分");
			condition=false;
		}
		
		if(condition == false) return false;
		else return true;
	}
	//點選店家時顯示店名
	$(document).ready(function() {
		$("#erid").hide(); 
		$('input[type=radio]').change(function() {
			if (this.value == '1') {
				$("#erid").show();
			}
			else if(this.value == '0'){
				$("#erid").hide(); 
			}
		});
	});


</script>

<div>
<h1>Register</h1>
	<form  onsubmit="return checkform()" action="register_after.php" method="post" name="regform">
		<p><span class="error">* required field</span></p>
			<label>個人暱稱:</label><span class="error">* </span><br>
			<input type="text" name="ename"> 
			<br>
			<label>帳號:</label><span class="error">* </span><br>
			<input type="text" name="eacc"> 
			<br>
			<label>密碼:</label><span class="error">* </span><br> 
			<input type="password" name="epw"> 
			<br>
			<label>確認密碼:</label><span class="error">* </span><br>
			<input type="password" name="epw_check">
			<br>
			<label>手機號碼(填入連續10位數字):</label><span class="error">* </span><br>
			<input type="tel" name="ephone" pattern="[0-9]{10}" title="填入連續10位數字">
			<br>
			<label>身分: </label><span class="error">*</span><br>
			<label class="radio"><input type="radio" name="emngr" value="1">  店家</label>
			<label class="radio"><input type="radio" name="emngr" value="0">  顧客</label>
			<br>
<div id="erid">
			<label>選擇您的店名: </label>
			<select name="erid" >
<?php
	include ("Project_connMySQL.php");
	$sql ="SELECT rname,rid FROM restaurant";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_row())
		{//fetch_assoc():把傳出的資料分割好放入row這個array中
			$rname = $row[0];
			$rid = $row[1];
			echo"
			<option value=\"$rid\"> <p class=\"menu\">$rname</p> </option>
			";
		}
	}
	else{
		echo "<h2>資料庫連接失敗</h2>";
	}			

?>	
</select>
</div>
			<input type="submit" value="註冊">
			<p  align="center">or</p>
	</form>
	<a href="home.php"><button>回到首頁</button></a>
</div>
</body>
</html>
