<html>

<head>

<meta charset="UTF-8">
<title>Menu Display</title>
</head>
<style>
body{
	font-family:"微軟正黑體";
	font-size:30px;
	margin:auto auto;
	margin-top:100px;
}
td{
	padding:10px;
}

</style>

<script>
	//var mrid = localStorage.getItem('mrid');
	//console.log('mrid='+mrid);

</script>

<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "group9_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES 'UTF8'");

if(isset($_POST['101'])){
	$mrid = 101;
}
if(isset($_POST['102'])){
	$mrid = 102;
}
if(isset($_POST['103'])){
	$mrid = 103;
}
if(isset($_POST['104'])){
	$mrid = 104;
}
if(isset($_POST['105'])){
	$mrid = 105;
}
if(isset($_POST['106'])){
	$mrid = 106;
}
if(isset($_POST['201'])){
	$mrid = 201;
}
if(isset($_POST['202'])){
	$mrid = 202;
}
if(isset($_POST['203'])){
	$mrid = 203;
}
if(isset($_POST['204'])){
	$mrid = 204;
}
if(isset($_POST['205'])){
	$mrid = 205;
}
if(isset($_POST['206'])){
	$mrid = 206;
}
if(isset($_POST['207'])){
	$mrid = 207;
}
if(isset($_POST['208'])){
	$mrid = 208;
}
if(isset($_POST['209'])){
	$mrid = 209;
}
if(isset($_POST['210'])){
	$mrid = 210;
}
if(isset($_POST['211'])){
	$mrid = 211;
}
if(isset($_POST['212'])){
	$mrid = 212;
}
if(isset($_POST['213'])){
	$mrid = 213;
}
if(isset($_POST['214'])){
	$mrid = 214;
}
if(isset($_POST['215'])){
	$mrid = 215;
}
if(isset($_POST['301'])){
	$mrid = 301;
}
if(isset($_POST['302'])){
	$mrid = 302;
}
if(isset($_POST['303'])){
	$mrid = 303;
}
if(isset($_POST['304'])){
	$mrid = 304;
}
if(isset($_POST['305'])){
	$mrid = 305;
}
if(isset($_POST['306'])){
	$mrid = 306;
}
if(isset($_POST['307'])){
	$mrid = 307;
}
if(isset($_POST['308'])){
	$mrid = 308;
}
if(isset($_POST['309'])){
	$mrid = 309;
}
if(isset($_POST['310'])){
	$mrid = 310;
}
if(isset($_POST['311'])){
	$mrid = 311;
}
		$sql = "SELECT * FROM menu WHERE mrid='$mrid'";
		$result = $conn->query($sql);
		$query = mysqli_query($conn, $sql);
		
		$sql01 = "SELECT * FROM score WHERE srid='$mrid'";
		$result01 = $conn->query($sql01);
		$query01 = mysqli_query($conn, $sql01);
		
		$sql02 = "SELECT AVG(srate) FROM score WHERE srid='$mrid'";
		$result02 = $conn->query($sql02);
		$query02 = mysqli_query($conn, $sql02);
//if ($result->num_rows > 0) {
    // output data of each row
    //while($row = $result->fetch_assoc()) {
        //echo "Restaurant_id: " . $row["mrid"]. "  Menu_id: " . $row["mid"]." - Menu_Name: " . $row["mname"]. " Price: " . $row["mprice"]. " Intro:  " . $row["mintro"]. " Calorie:  ". $row["mcal"]. "<br>";
    //}
//} else {
    //echo "0 results";
//}
?>




<body style="background-color:black;">
<p>

</p>
<table border="1" style="font-size:30px; background-color:#66b3ff; text-align:center; color:white;" align="center">
 <?php
		$sql2 ="SELECT rname FROM restaurant WHERE rid = '$mrid'"; 
		$result2=$conn->query($sql2);
		//$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result2);
		//echo "Result: " . $row['eid'];
		$rname = $row["rname"];
		
	echo"<h2 align=center><font color=white> $rname 的菜單 </font></h2>";
?>

   <tr>
    <!--
	<td >餐廳編號</td> 
    <td >菜單編號</td>-->
    <td >餐點名稱</td>
    <td >價格</td>
    <td >介紹</td>
	<!--
    <td >素食與否</td>-->
	<td >熱量</td>

  </tr>
<?php
   while($rs = mysqli_fetch_array($query)) {
   ?>

  <tr>
  <!--
    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>-->
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
	<!--
    <td><?php echo $rs[5]?></td>-->
	<td><?php echo $rs[6]?></td>

  </tr>
  
  <?php
}
?>
<table border="1" style="font-size:30px; background-color:#66b3ff; text-align:center; color:white;" align="center">

 <?php
		$sql2 ="SELECT rname FROM restaurant WHERE rid = '$mrid'"; 
		$result2=$conn->query($sql2);
		//$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result2);
		//echo "Result: " . $row['eid'];
		$rname = $row["rname"];
		
	echo"<h2 align=center><font color=white>以下為對 $rname 的所有留言評論</font> </h2>";
?>


   <tr>
    <!--
    <td >編號</td>-->
    <td >留言者</td>
	 <!--
    <td >留言者id</td>
    <td >餐廳id</td>-->
    <td >評分</td>
    <td >評分日期</td>
	<td >留言內容</td>

  </tr>
<?php
   while($rs = mysqli_fetch_array($query01)) {
   ?>

  <tr>
  <!--
    <td><?php echo $rs[0]?></td>-->
    <td><?php echo $rs[1]?></td>
	<!--
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>-->
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
	<td><?php echo $rs[6]?></td>

  </tr>
  
  <?php
}
?>
<?php
   while($rs = mysqli_fetch_array($query02)) {
   ?>

  <tr>

  <td><?php echo "平均分數："?></td>
  <td><?php echo $rs[0]?></td>
  <td><?php echo " "?></td>
  <td><?php echo " "?></td>   

  </tr>
  
  <?php
}
?>
</table>
<p>&nbsp;</p>
</body>



<head>
	<title>Displaying MySQL Data in HTML Table</title>
</head>

</html>

