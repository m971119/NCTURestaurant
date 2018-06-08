<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="login_styles.css">
</head>
<body style="background-color:black;">

<div>
<?php
//REGISTER
        include ("Project_connMySQL.php");
		session_start();
        $eacc = $_SESSION['account'];
		$srid = $_POST['srid'];
		$srate = $_POST['srate'];
		$sdetail = $_POST['sdetail'];
		
		$sql ="SELECT eid FROM employee WHERE eacc = '$eacc'"; 
		$result=$conn->query($sql);
		//$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		//echo "Result: " . $row['eid'];
		$eid = $row["eid"];
		$seid = $eid; //seid=rid
		//echo "seid=: $seid";
		
		$sql2 ="SELECT rname FROM restaurant WHERE rid = '$srid'"; 
		$result2=$conn->query($sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$rname = $row2["rname"];
		
		$sql3 ="SELECT seid FROM score WHERE srid='$srid' and seid='$seid'";
		$result3 = $conn->query($sql3);
		$row3 = mysqli_fetch_assoc($result3);
		
		

		if(!(empty($eacc)||empty($srid)||empty($srate))){
			if($result3->num_rows > 0){//同一家餐廳重複留言
				echo "<p align=center>你曾經對 $rname 留言過了，新留言已覆蓋舊的留言囉</p>";
				$sqlUPDATE="UPDATE `score` SET `srate`='$srate',`stime`=CURTIME(),`sdetail`='$sdetail' WHERE srid='$srid' and seid='$seid'";
				
				//$sql = "INSERT INTO `score`(`seacc`, `seid`, `srid`, `srate`,`sdetail`,`stime`  ) VALUES ('$eacc','$seid','$srid','$srate','$sdetail', CURTIME())";
				$result=$conn->query($sqlUPDATE);
				
				echo"<h2 align=center><font color=black>以下為$eacc 本次對 $rname 的留言評論 </font></h2>";
				echo"<p align=center>Rate: $srate </p>";
				echo"<p align=center>Detail: $sdetail </p>";
					
			}else{//新留言
				$sql = "INSERT INTO `score`(`seacc`, `seid`, `srid`, `srate`,`sdetail`,`stime`  ) VALUES ('$eacc','$seid','$srid','$srate','$sdetail', CURTIME())";
				$result=$conn->query($sql);
				
					/*
					echo"<p align='center'><font color=white>Submit Success留言評分成功</font></p>";
					echo"<p>User account: $eacc </p>";
					echo"<p>User id: $seid </p>";
					echo"<p>Restaurant id: $srid</p>";
					echo"<p>Restaurant Name: $rname</p>";
					*/
					
					
				echo"<h2 align=center><font color=black>以下為$eacc 本次對 $rname 的留言評論 </font></h2>";
				echo"<p align=center>Rate: $srate </p>";
				echo"<p align=center>Detail: $sdetail </p>";
				
			}
        }else{
			echo "<p align='center'> <font color=red  size='10pt'>未成功留言評論，請重新輸入</font> </p>";

        }
	
	
		$sql01 = "SELECT * FROM score WHERE sid = (SELECT MAX(sid) FROM score WHERE seacc = '$eacc')";
		$result01 = $conn->query($sql01);
		$query01 = mysqli_query($conn, $sql01);
		
		$sql02 = "SELECT AVG(srate) FROM score WHERE srid='$srid'";
		$result02 = $conn->query($sql02);
		$query02 = mysqli_query($conn, $sql02);

?>
<!--
<body style="background-color:black;">
<table border="1" style="font-size:30px; background-color:#66b3ff; text-align:center; color:white;" align="center">
<p>

</p>

   <tr>
 
    <td >編號</td>
    <td >留言者</td>
	<!--
    <td >留言者id</td>
    <td >餐廳id</td>
    <td >評分</td>
    <td >評分日期</td>
	<td >留言內容</td>

  </tr>
  -->
<?php
   while($rs = mysqli_fetch_array($query01)) {
   ?>
  <!--
  <tr>

    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>

    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
	<td><?php echo $rs[6]?></td>

  </tr>
  -->
  <?php
}
?>
<?php
   while($rs = mysqli_fetch_array($query02)) {
   ?>
<!--
  <tr>

  <td><?php echo "平均分數："?></td>
  <td><?php echo $rs[0]?></td>
  <td><?php echo " "?></td>
  <td><?php echo " "?></td>   

  </tr>
  -->
  <?php
}
?>
<table>

</table>

<button onclick="location.href = 'home.php';" id="myButton" class="float-left submit-button" >回到首頁 Back to Home Page</button>
</div>
</body>
-->
</html>
