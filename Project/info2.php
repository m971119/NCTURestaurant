<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="home_style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Michroma" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="home.php" class="w3-bar-item w3-button"><button class="w3-button  ">HOME</button></a>
    <a href="home.php #讓我看看餐廳" class="w3-bar-item w3-button"><button class="w3-button  ">讓我看看餐廳</button></a>
    <a href="score.php" class="w3-bar-item w3-button"> <button class="w3-button">心得評論</button></a>
	<div class="w3-dropdown-hover w3-right">
	<label style="margin-top:10px;"class ="w3-bar-item logout" id ="name"> </label>
    </div>
  </div>
</div>

<!-- 詳細內容 Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="詳細內容">
  <div class="w3-content"></div>
  
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
		$sql = @"SELECT * FROM menu WHERE mrid='$mrid'";
		$result = $conn->query($sql);
		$query = mysqli_query($conn, $sql);
		
		$sql01 = @"SELECT * FROM score WHERE srid='$mrid'";
		$result01 = $conn->query($sql01);
		$query01 = mysqli_query($conn, $sql01);
		
		$sql02 = @"SELECT AVG(srate) FROM score WHERE srid='$mrid'";
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
<?php
		$sql2 = @"SELECT rname FROM restaurant WHERE rid = '$mrid'"; 
		$result2=$conn->query($sql2);
		//$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result2);
		//echo "Result: " . $row['eid'];
		$rname = $row["rname"];	
	echo"<h1 class=\"w3-center w3-jumbo\" style=\"margin-bottom:32px\">$rname</h1>";
?>

    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="open詳細內容(event, '菜單');" id="myLink">
        <div class="w3-col s6 tablink w3-padding-large w3-black w3-hover-teal">菜單</div>
      </a>
      <a href="javascript:void(0)" onclick="open詳細內容(event, '評論');">
        <div class="w3-col s6 tablink w3-padding-large w3-black w3-hover-teal">評論</div>
      </a>
    </div>
	
	<div id="菜單" class="w3-container 詳細內容 w3-padding-32 w3-white">
		<!--<table border="1" style="font-size:30px; background-color:#66b3ff; text-align:center; color:white;" align="center">-->
		<table class="table table-condensedv">
		<thead>
		<tr>
        <!--
		<td >餐廳編號</td> 
		<td >菜單編號</td>-->
		<td ><h1 style="color:teal"><b>餐點名稱</b></h1></td>
		<td ><h1 style="color:teal"><b>價格</b></h1></td>
		<td ><h1 style="color:teal"><b>介紹</b></h1></td>
		<!--
		<td >素食與否</td>-->
		<td ><h1 style="color:teal"><b>熱量</b></h1></td>
		</tr>
		</thead>
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
		</table>
		
	</div>
	
	<div id="評論" class="w3-container 詳細內容 w3-padding-32 w3-white">
		<!--<table border="1" style="font-size:30px; background-color:#66b3ff; text-align:center; color:white;" align="center">-->
		<?php
		$sql2 ="SELECT rname FROM restaurant WHERE rid = '$mrid'"; 
		$result2=$conn->query($sql2);
		//$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result2);
		//echo "Result: " . $row['eid'];
		$rname = $row["rname"];
		?>
		<table class="table table-condensedv">
		<thead>
		<tr>
		<!--
		<td >編號</td>-->
		<td ><h1 style="color:teal"><b>留言者</b></h1></td>
		 <!--
		<td >留言者id</td>
		<td >餐廳id</td>-->
		<td ><h1 style="color:teal"><b>評分</b></h1></td>
		<td ><h1 style="color:teal"><b>評分日期</b></h1></td>
		<td ><h1 style="color:teal"><b>留言內容</b></h1></td>
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
		</thead>
		</table>
		<?php
		while($rs = mysqli_fetch_array($query02)) {
		?>
		<!--<tr>
		<td><?php echo " "?></td>
		<td><?php echo "平均分數："?></td>
		<td><?php echo $rs[0]?></td>
		<td><?php echo " "?></td>   
		</tr>-->
		<h1 style="color:teal" align="center" class="w3-border-top w3-border-teal"><b>平均分數：<?php echo $rs[0]?></b></h1>
		<?php
		}
		?>
		
		
	</div>

	
<script>
// Tabbed 詳細內容
function open詳細內容(evt, 詳細內容Name) {
  var i, x, tablinks;
  x = document.getElementsByClassName("詳細內容");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(詳細內容Name).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>








</body>
</html>