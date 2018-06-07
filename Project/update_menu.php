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
	include ("Project_connMySQL.php");
	//啟動session	
	session_start();
	//讀取session變數
	$acc = $_SESSION['account'];
	$erid = $_SESSION['erid'];
	$sql ="SELECT rname FROM restaurant where rid='$erid'";
	$result=$conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$rname = $row["rname"];
	
?>

<div>
<?php echo"<h1>【 $rname 】 <label class=\"update\">修改菜單</label></h1>";?>
	<form  onsubmit="return checkform()" action="update_submit.php" method="post" name="updateform">
			
		<?php 
			echo"<h3>▶ 店家帳號： <span class=\"error\">$acc </span></h3>"; 
		?>
			<label class="word">。欲修改品項： </label><br>
			<form>
			<select name="menu">
		<?php 
			$sql ="SELECT mid,mname,mprice,mintro,mveg,mcal FROM menu WHERE mrid=$erid";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				//echo "<h2>拿到資料</h2>";
				while($row = $result->fetch_row())
				{//fetch_assoc():把傳出的資料分割好放入row這個array中
					$mid = $row[0];
					$mname = $row[1];
					$mprice = $row[3];
					$mintro = $row[4];
					$mveg = $row[5];
					$mcal = $row[6];
					echo"
					<option value=\"$mid\"> <p class=\"menu\">$mname</p> </option>
					";
				}
			}
			else{
			  echo "<h2>資料庫連接失敗</h2>";
			}			
		?>
			</select>
			<br>
		
			<label class="word">。修改價格：</label>
			<input type="number" name="mprice" min="0" max="10000">
			<br>
			<label class="word">。修改介紹：</label><br>
			<input type="text" name="mintro">
			<br>
			<label class="word">。修改卡路里數(大卡)：</label><br>
			<input type="number" name="mcal">
			
			<br>
			<input type="submit" value="確認修改">
	</form>
</div>
<script>
	function checkform(){
		//evt.preventDefault();
		var myForm = document.updateform;
		var condition = true;

		if(myForm.mprice.value=="" && myForm.mintro.value=="" && myForm.mcal.value==""){
			alert("請輸入欲修改內容");
			myForm.mprice.focus();
			condition = false;
		}
		

		
		if(condition == false) return false;
		else return true;
	}
	

</script>

</body>
</html>
