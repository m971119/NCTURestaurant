<head>
<link rel="stylesheet" type="text/css" href="login_styles.css">
<meta charset="UTF-8">
<style>
h3{
	font-family:Bahnschrift SemiBold,Courier,微軟正黑體;
	font-size:50px;
	text-align:center;
	margin-right:50px;
}
.word2{
	font-family: "微軟正黑體";
	font-size:35px;
	color:black;
	text-align:left;
	padding-left:80px;
}

</style>
</head>

<body style="background-color:black;margin: 50px 150px 50px 150px;">
<div>
<?php
//REGISTER
        include ("Project_connMySQL.php");
        $eacc = $_POST['eacc'];
		$epw = $_POST['epw'];
		$ename = $_POST['ename'];
		$ephone = $_POST['ephone'];
		$emngr = $_POST['emngr'];
		$erid = $_POST['erid'];
		if($emngr == 1)
			$mngr = "店家";
		else
			$mngr = "顧客";
		
		
		//result1檢查帳號是否已有人使用
		$sql ="SELECT eacc,epw FROM employee WHERE eacc='$eacc'"; 
		$result1 = $conn->query($sql);
		//result2檢查店家是否已經有人註冊
		$sql2 ="SELECT eacc,epw FROM employee WHERE erid='$erid'"; 
		$result2 = $conn->query($sql2);
		
		
		if($result1->num_rows > 0){
			$message = "  帳號名稱已經被使用過 請重新註冊";
			echo "<script>";
			echo "alert('$message');";
			echo "window.location.href='register.php';";
			echo "</script>";
		}
		else if(($emngr == 1) && ($result2->num_rows > 0)){
			$message = "  本店已有帳號申請，一店家僅能註冊一帳號。";
			echo "<script>";
			echo "alert('$message');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
		else
		{
			if($emngr == 0){
				$sql = "INSERT INTO employee(`eacc`, `epw`, `ename`, `ephone`,`emngr`) VALUES ('$eacc','$epw','$ename','$ephone','$emngr')";
				$conn->query($sql);
			}
			else{
				$sql = "INSERT INTO employee(`eacc`, `epw`, `ename`, `ephone`,`emngr`,`erid`) VALUES ('$eacc','$epw','$ename','$ephone','$emngr','$erid')";
				$conn->query($sql);
			}
			//檢測是否成功註冊
			$sql ="SELECT eacc,epw FROM employee WHERE eacc='$eacc'"; 
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				$link="login.php";
				echo "
				<h3>恭喜註冊成功，歡迎使用NCTU Restaurant！<br></h3>
				<ul class=\"word2\">
				<li>帳號名稱: <span class=\"error\">$eacc</span></li>
				<li>個人暱稱: <span class=\"error\">$ename</span></li>
				<li>身分: <span class=\"error\">$mngr</span></li>
				</ul>
				<a href='".$link."'><button>回到登入</button></a>
				";
			}
			else 
			{
				echo "<h3>註冊失敗!<br></h3>";
			}
			
		}
		
		
?>
</div>
<body>
