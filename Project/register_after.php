<head>
<link rel="stylesheet" type="text/css" href="login_styles.css">
<meta charset="UTF-8">
</head>
<?php
//REGISTER
        include ("Project_connMySQL.php");
        $eacc = $_POST['eacc'];
		$epw = $_POST['epw'];
		$ename = $_POST['ename'];
		$ephone = $_POST['ephone'];
		$emngr = $_POST['emngr'];
		if($emngr == 1)
			$mngr = "店家";
		else
			$mngr = "顧客";
		echo "<script>";
		echo "alert('mngr = $mngr'+' emngr = $emngr');";
		echo "</script>"; 
		
		
		
		$sql ="SELECT eacc,epw FROM employee WHERE eacc='$eacc'"; 
		$result = $conn->query($sql);
		//檢查帳號是否已有人使用
		if($result->num_rows > 0){
			$message = "帳號名稱已經被使用過 請重新註冊";
			echo "<script>";
			echo "alert('$message');";
			echo "window.location.href='register.php';";
			echo "</script>";
		}		
		else
		{
			$sql = "INSERT INTO employee(`eacc`, `epw`, `ename`, `ephone`,`emngr`) VALUES ('$eacc','$epw','$ename','$ephone','$emngr')";
			$conn->query($sql);
			//檢測是否成功註冊
			$sql ="SELECT eacc,epw FROM employee WHERE eacc='$eacc'"; 
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				
				
				
				$link="Project_home.html";
				echo "
				<label>恭喜註冊成功!<br></label>
				<ul>
				<li>帳號名稱: $eacc</li>
				<li>個人暱稱: $ename</li>
				<li>身分: $mngr</li>
				</ul>
				<a href='".$link."'><button>回到首頁</button></a>
				";
			}
			else 
			{
				echo "<label>註冊失敗!<br></label>";
			}
			
		}
		
		
?>
