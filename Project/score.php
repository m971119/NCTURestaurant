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
				while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
					  //localStorage帳號名稱及密碼
					  $rnum = $row[0];
					  $name = $row[1];
					  //console.log('rnum = '+rnum+' name = '+name);

					  //$link="restaurant_info.php";
					echo "
					  <label class=\"radio\"><input type=\"radio\" name=srid class=\"button1\" value=\"$rnum\">$name</label>
						";
				}
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
