<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="login_styles.css">
<style>
h3{
	font-family:Bahnschrift SemiBold,Courier,微軟正黑體;
	text-align:right;
	margin-right:50px;
}

</style>
</head>

<body style="background-color:black;">
<?php
	//啟動session	
	session_start();
	//讀取session變數
	$acc = $_SESSION['account'];
?>

<div>
<h1>評分留言</h1>
	<form  onsubmit="return checkform()" action="score_submit.php" method="post" name="scoreform">
		<p><span class="error">* required field</span></p>
			
			<?php echo"<h3>▶ 顧客帳號： <span class=\"error\">$acc </span></h3>"; ?>

			<label class="word">。評分餐廳： </label><br>
			<?php 
			include ("Project_connMySQL.php");
			$sql ="SELECT rid,rname FROM restaurant";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				//echo "<h2>拿到資料</h2>";
				echo"<select name='srid' id='srid'>";
				while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
					  //localStorage帳號名稱及密碼
					  $srid = $row[0];
					  $name = $row[1];
					  //console.log('rnum = '+rnum+' name = '+name);

					  //$link="restaurant_info.php";
					//<option value='".$row[0]."'>".$row[1]."</option>
					//<option value='$srid' name='$srid'>".$row[1]."</option>
					 echo "
					 <option value='$srid'>$name</option>
					 ";
					 
					/*
					"<label class=\"radio\"><input type=\"radio\" name=srid class=\"button1\" value=\"$rnum\">$name</label>";
					<label class="radio"><input type="radio" name="srid" value="101">  非羹不可</label>
					*/
				}
				echo"</select>";
			}
			else{
			  echo "<h2>資料庫連接失敗</h2>";
			}			
			?>
			<br><br>
			<label class="word">。評分:</label><span class="error">* </span><br>
			<label class="radio"><input type="radio" name="srate" value="1">  1</label>
			<label class="radio"><input type="radio" name="srate" value="2">  2</label>
			<label class="radio"><input type="radio" name="srate" value="3">  3</label>
			<label class="radio"><input type="radio" name="srate" value="4">  4</label>
			<label class="radio"><input type="radio" name="srate" value="5">  5</label>
			
			<br><br>
			<label class="word">。留言:</label><span class="error">* </span><br>
			<input type="text" name="sdetail">
			<br>
			
			<br>
			<input type="submit" value="評分">
			
	</form>
	<button onclick="location.href = 'home.php';" id="myButton" class="float-left submit-button" >回到首頁 Back to Home Page</button>
</div>
<script>
	function checkform(){
		//evt.preventDefault();
		var myForm = document.scoreform;
		var condition = true;

		if(myForm.srid.value==""){
			alert("請選擇評分餐廳");
			myForm.srid.focus();
			condition = false;
		}
		else if(myForm.srate.value==""){
			alert("請選擇評分高低");
			myForm.srate.focus();
			condition=false;
		}
		else if(myForm.sdetail.value==""){
			alert("請輸入留言");
			myForm.sdetial.focus();
			condition=false;
		}

		
		if(condition == false) return false;
		else return true;
	}
	

</script>

</body>
</html>
