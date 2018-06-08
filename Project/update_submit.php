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
.word2{
	font-family: "微軟正黑體";
	font-size:35px;
	color:1f3d7a;
	text-align:left;
	padding-left:80px;
}

</style>
</head>

<body style="background-color:black; margin: 50px 300px 50px 300px;">

<div style="padding:40px;">

<?php
//REGISTER
        include ("Project_connMySQL.php");
		//記得啟動session		
		session_start();
        $eacc = $_SESSION['account'];
		$mid = $_POST['mid'];//meal菜 id
		$mprice = $_POST['mprice'];//修改後的價錢
		$mintro = $_POST['mintro'];//修改後的簡介
		$mcal = $_POST['mcal'];//修改後的卡路里
		//取餐廳名稱
		$sql ="SELECT rname FROM restaurant,menu where mid='$mid' AND rid=mrid";
		$result=$conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		$rname = $row["rname"];
		//取更新的菜名稱
		$sql ="SELECT mname FROM menu where mid='$mid'";
		$result=$conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		$mname = $row["mname"];
		
		echo"
			<h1>【 $rname 】 <label class=\"update\">菜單修改成功！</label></h1>
			<label class=\"mname\">• $mname •</label>
			";
		
		if(!(empty($mprice))){
			$sql1 = " UPDATE menu SET mprice='$mprice' WHERE mid='$mid' ";
			$result1 = $conn->query($sql1);
			if($result1)
				echo"
			<label class=\"word2\"> <br>✔ 成功更新價格： <span class=\"error\">NT $mprice </span></label>
			";
		}
		if(!(empty($mintro))){
			$sql2 = " UPDATE menu SET mintro='$mintro' WHERE mid='$mid' ";
			$result2 = $conn->query($sql2);
			if($result2)
				echo"
			<label class=\"word2\"> <br>✔ 成功更新介紹： <span class=\"error\"> $mintro </span></label>
			";
		}
		if(!(empty($mcal))){
			$sql3 = " UPDATE menu SET mcal='$mcal' WHERE mid='$mid' ";
			$result3 = $conn->query($sql3);
			if($result3)
				echo"
			<label class=\"word2\"> <br>✔ 成功更新卡路里： <span class=\"error\"> $mcal 大卡</span></label>
			";
		}
		
		$link="home.php";
		echo"
		<br><br><a href='".$link."'><button>回到首頁</button></a>
		";
	?>


</div>

</body>
</html>
