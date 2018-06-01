<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="login_styles.css">
</head>

<body style="background-color:black;">

<div>

<?php
        include ("Project_connMySQL.php");
		//method = "post"
        $eacc = $_POST['eacc'];
        $epw = $_POST['epw'];
		
?>



<?php		
		
		
        if(isset($eacc)&&isset($epw)){//isset確認帳號密碼有東西
                    $sql ="SELECT eacc,epw FROM employee WHERE eacc='$eacc'";                     
                    $result = $conn->query($sql);//把變數丟進資料庫 讓他回傳
                          if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){//fetch_assoc():把傳出的資料分割好放入row這個array中
                            if($row["eacc"]==$eacc&&$row["epw"]==$epw){
                                echo "<h2>登入成功！ 歡迎使用本系統</h2>";
								//localStorage帳號名稱及密碼
								echo"
								<script>
								var eacc = '$eacc';
								var epw = '$epw';
								localStorage.setItem('eacc', eacc);
								//localStorage.setItem('epw', epw);
								//console.log('eacc = '+eacc+' epw = '+epw);
								</script>
								";
                            }else{
                                echo "<h2>帳號或密碼輸入錯誤，登入失敗！</h2>";
								$link="register.php";
								echo"
								<a href='".$link."'><button>註冊</button></a>";
								
                            }
                    }}else{
                        echo "<h2>資料庫連接失敗</h2>";
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