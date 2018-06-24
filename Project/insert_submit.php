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
.word3{
	font-family: "微軟正黑體";
	font-family: Courier;
	color:6699ff;
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
		$erid = $_SESSION['erid'];
		$new = $_POST['new'];//修改後的新菜名
		$mprice = $_POST['mprice'];//修改後的價錢
		$mintro = $_POST['mintro'];//修改後的簡介
		$mcal = $_POST['mcal'];//修改後的卡路里
		//取餐廳名稱
		$sql ="SELECT rname FROM restaurant where rid='$erid'";
		$result=$conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		$rname = $row["rname"];
		//取該餐廳菜名稱避免重複
		$sql2 ="SELECT mname FROM menu where mname='$new'";
		$result2=$conn->query($sql2);
		//$rrr = $result->num_rows;
		//$row = mysqli_fetch_array($result);
		//$mname = $row["mname"];
		
		if($result2->num_rows >0){
					$message="此菜菜已經在裡面囉！請重新新增菜單。";
					echo "<script>";
					echo "alert('$message');";
					echo "window.location.href='insert_menu.php';";
					echo "</script>";
		}
		else{
			echo"
			<h1>【 $rname 】 <label class=\"update\">新菜色增加成功！</label></h1>
			<label class=\"mname\">• $new •</label>
			";
			if(!(empty($mprice))&&(!(empty($mintro)))&&(!(empty($mintro)))){
			$sql4 ="SELECT mid FROM menu where mrid='$erid'";
			$result= $conn->query($sql4);
			//$row = mysqli_fetch_assoc($result);
			$rr = $result->num_rows;
			$newnum = 100*$erid + $rr + 1;
			//echo"$newnum";
				
			$sql1 = "INSERT INTO menu VALUES('$erid','$newnum','$new','$mprice','$mintro','0','$mcal')";
			$result1 = $conn->query($sql1);
				if($result1){
					echo"
					<label class=\"word2\"> <br>✔ 新菜菜價格： <span class=\"word3\">NT $mprice </span></label>
					<label class=\"word2\"> <br>✔ 新菜菜介紹： <span class=\"word3\"> $mintro </span></label>
					<label class=\"word2\"> <br>✔ 新菜菜卡路里： <span class=\"word3\"> $mcal 大卡</span></label>
					";
					}
			}
		}
				
		
		/*if(!(empty($mintro))){
			$sql2 = " menu SET mintro='$mintro' WHERE mid='$mid' ";
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
		}*/
		
		$link="home.php";
		echo"
		<br><br><a href='".$link."'><button>回到首頁</button></a>
		";
	?>


</div>

</body>
</html>
