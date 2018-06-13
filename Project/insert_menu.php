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
<?php echo"<h1>【 $rname 】 <label class=\"update\">菜單新增</label></h1>";?>
	<form  onsubmit="return checkform()" action="insert_submit.php" method="post" name="updateform">
			
		<?php 
			echo"<h3>▶ 店家帳號： <span class=\"error\">$acc </span></h3>"; 
		?>
			<label class="word">。我想新增新菜色： </label><br>
			<input type="text" name="new">
			<form>
			<br>
		
			<label class="word">。新菜菜的價格：</label>
			<input type="number" name="mprice" min="0" max="10000">
			<br>
			<label class="word">。新菜菜介紹：</label><br>
			<input type="text" name="mintro">
			<br>
			<label class="word">。新菜菜的卡路里數(大卡)：</label><br>
			<input type="number" name="mcal">
			
			<br>
			<input type="submit" value="新菜菜上市">
	</form>
	<a href="home.php"><button>回到首頁</button></a>
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
