<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="login_styles.css">
</head>

<body style="background-color:black; margin: 50px 300px 50px 300px;">

<div>

<?php
    include ("Project_connMySQL.php");
	//method = "post"
    $eacc = $_POST['eacc'];
    $epw = $_POST['epw'];

    if(isset($eacc)&&isset($epw)){//isset確認帳號密碼有東西
        $sql ="SELECT eacc,epw,emngr,erid FROM employee WHERE eacc='$eacc'";                     
        $result = $conn->query($sql);//把變數丟進資料庫 讓他回傳
        if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){//fetch_assoc():把傳出的資料分割好放入row這個array中
                if($row["eacc"]==$eacc&&$row["epw"]==$epw){
					//記得啟動session								
					session_start();
					//寫入session變數
					$_SESSION['account'] = $eacc;
					$_SESSION['password'] = $epw;
					$a = $_SESSION['account'];
					//抓顧客暱稱
					$sql2 ="SELECT ename FROM employee WHERE eacc='$eacc'"; 
					$result2=$conn->query($sql2);
					$row2 = mysqli_fetch_assoc($result2);
					$ename = $row2["ename"];
					//localStorage帳號、暱稱
					echo"
					<script>
					var eacc = '$eacc';
					var epw = '$epw';
					var ename = '$ename';
					localStorage.setItem('eacc', eacc);
					localStorage.setItem('ename', ename);
					</script>
					";

					//判斷店家還是顧客
					if($row["emngr"]==1){
						//抓哪家店的店長 erid 餐廳編號
						$sql2 ="SELECT ename,erid FROM employee WHERE eacc='$eacc'"; 
						$result2=$conn->query($sql2);
						$row = mysqli_fetch_assoc($result2);
						$erid = $row["erid"];
						$ename = $row["ename"];
						$_SESSION['manager'] = true;
						$_SESSION['erid'] = $erid;
							echo"
							<script>
							var emngr = 1;
							localStorage.setItem('emngr', emngr);
							</script>
							";
							echo "<h2>店家".$a."登入成功！ 歡迎使用本系統</h2>";
					}
					else{
						$_SESSION['manager'] = false;
						echo"
							<script>
							var emngr = 0;
							localStorage.setItem('emngr', emngr);
							</script>
							";
							echo "<h2>顧客".$a."登入成功！ 歡迎使用本系統</h2>";
					}			
                }
				else{
                    $message = "  密碼錯誤，請重新登入或註冊。";
					echo "<script>";
					echo "alert('$message');";
					echo "window.location.href='login.php';";
					echo "</script>";
                }
            }
		}else{
            $message = "  未註冊之帳號，請重新登入或註冊。";
			echo "<script>";
			echo "alert('$message');";
			echo "window.location.href='login.php';";
			echo "</script>";
        }
        }else{
            echo "未輸入帳號密碼";
        }
		
		$link="home.php";
		echo"
		<a href='".$link."'><button>回到首頁</button></a>
		";
?>

</div>
</body>
</html>