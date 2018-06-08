<!DOCTYPE html>
<html>
<title>NCTU Restaurants</title>
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

<style>
.margin{
	margin-left:40px;
	margin-right:40px;
	border-style: solid;
	border-color:grey;
	border-width:1px;
}
.chinese{
	font-family: "微軟正黑體";
}
</style>
</head>

<body>

<script>
	//顯示登入與否
	$(document).ready(function(){
		var eacc = localStorage.getItem('eacc');
		var emngr = localStorage.getItem('emngr');
		var ename = localStorage.getItem('ename');
		console.log('eacc='+eacc);
		console.log('emngr='+emngr);
		
		if(eacc != "" && eacc != null){//登入中
			document.getElementById("name").innerHTML = "Hello, "+ename+"!";
			$(".login").hide();		
			$(".logout").show();
			if(emngr == 0){
				$(".elogin").show();
				$(".mlogin").hide();
			}
			else{
				$(".elogin").hide();
				$(".mlogin").show();
			}
				
			
		}
		else{//沒登入
			$(".login").show();
			$(".logout").hide();
			$(".elogin").hide();
			$(".mlogin").hide();
		}
	});
	
	function logout(){
		localStorage.removeItem('eacc');
	}
	
</script>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button"><button class="w3-button  ">HOME</button></a>
    <a href="#讓我看看餐廳" class="w3-bar-item w3-button"><button class="w3-button">讓我看看餐廳</button></a>
	<a href="update_menu.php" class="w3-bar-item w3-button mlogin"> <button class="w3-button mlogin">修改菜單</button></a>
	<a href="insert_menu.php" class="w3-bar-item w3-button mlogin"> <button class="w3-button mlogin">新增菜單</button></a>
    <a href="score.php" class="w3-bar-item w3-button elogin"> <button class="w3-button elogin">心得評論</button></a>
	
	<div class="w3-dropdown-hover w3-right">
    <a href="login.php" class="w3-bar-item w3-button login"> <button class="w3-button login">登入</button></a>
	<label style="margin-top:10px;"class ="w3-bar-item logout" id ="name"> </label>
	<a href="logout.php" onclick="logout();" class="w3-bar-item w3-button logout"> <button class="w3-button logout">登出</button></a>
    </div>
  </div>
</div>


	
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="chinese w3-tag w3-xlarge">週末營運時間有所不同</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px"><strong>NCTU Restaurant</strong></span>
    <!-- <p><a href="#讓我看看餐廳" class="w3-button w3-xxlarge w3-black"><button class="w3-button">讓我看看餐廳</button></a></p> -->
  </div>
</header>

<!-- 讓我看看餐廳 Container -->

<div class="w3-container w3-black w3-padding-64 w3-xxlarge " id="讓我看看餐廳" >

    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Restaurants</h1>
<div class="chinese">
<div class="margin">	
    <div class="w3-row w3-center " >
      <a href="javascript:void(0)" onclick="open讓我看看餐廳(event, '一餐');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-black w3-hover-blue">一餐</div>
      </a>
      <a href="javascript:void(0)" onclick="open讓我看看餐廳(event, '二餐');">
        <div class="w3-col s4 tablink w3-padding-large w3-black w3-hover-blue">二餐</div>
      </a>
      <a href="javascript:void(0)" onclick="open讓我看看餐廳(event, '女二');">
        <div class="w3-col s4 tablink w3-padding-large w3-black w3-hover-blue">女二</div>
      </a>
    </div>

<div id="一餐" class="w3-container 讓我看看餐廳 w3-padding-32 w3-white ">
		
	<form action="info2.php" method="post">
	<?php
    include ("Project_connMySQL.php");

    $sql ="SELECT rid,rname FROM restaurant WHERE rlocate=1";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
            $rnum = $row[0];
            $name = $row[1];
            echo "
            <input type=\"submit\" name=$rnum class=\"button1\" value=\"$name\">
            <hr>
             ";
        }
    }
    else{
      echo "<h2>資料庫連接失敗</h2>";
    }
//隨機選餐廳
	$result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
		$random = (rand()% 6)+1;
		$random = $random + 100;
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
            $rnum = $row[0];
			if($random == $rnum){
				echo "<input style=\"background-color:#005c99;margin-left:auto;margin-right:auto;display:block;margin-top:0%;margin-bottom:0%\" type=\"submit\" name=$rnum value=\"不知道吃什麼？點我！\" class=\"button1\"> ";
			}
        }
    }
    else{
		echo "<h2>資料庫連接失敗</h2>";
    }
	?>
	</form>
</div>

<div id="二餐" class="w3-container 讓我看看餐廳 w3-padding-32 w3-white">
	<form action="info2.php" method="post">
  <?php
    

    $sql ="SELECT rid,rname FROM restaurant WHERE rlocate=2";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
            $rnum = $row[0];
            $name = $row[1];

            echo"
            <a><input type=\"submit\" name=$rnum class=\"button1\" value=\"$name\"></a>
            <hr>
            ";
        }
    }
    else{
      echo "<h2>資料庫連接失敗</h2>";
    }
//隨機選餐廳
	$result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
		$random = (rand()% 15)+1;
		$random = $random + 200;
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
              $rnum = $row[0];
			if($random == $rnum){
				echo "<input style=\"background-color:#005c99;margin-left:auto;margin-right:auto;display:block;margin-top:0%;margin-bottom:0%\" type=\"submit\" name=$rnum value=\"不知道吃什麼？點我！\" class=\"button1\"> ";
			}
        }
    }
    else{
      echo "<h2>資料庫連接失敗</h2>";
    }
    ?>  
	</form>
</div>
<div id="女二" class="w3-container 讓我看看餐廳 w3-padding-32 w3-white">
	<form action="info2.php" method="post">
  <?php
    

    $sql ="SELECT rid,rname FROM restaurant WHERE rlocate=3";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
              //localStorage帳號名稱及密碼
              $rnum = $row[0];
              $name = $row[1];

              echo"
              <a><input type=\"submit\" name=$rnum class=\"button1\" value=\"$name\"></a>
                <hr>
              ";
        }
    }
    else{
      echo "<h2>資料庫連接失敗</h2>";
    }
	//隨機選餐廳
	$result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
		$random = (rand()% 11)+1;
		$random = $random + 300;
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
              //localStorage帳號名稱及密碼
              $rnum = $row[0];
			if($random == $rnum){
				echo "<input style=\"background-color:#005c99;margin-left:auto;margin-right:auto;display:block;margin-top:0%;margin-bottom:0%\" type=\"submit\" name=$rnum value=\"不知道吃什麼？點我！\" class=\"button1\"> ";
			}
        }
    }
    else{
      echo "<h2>資料庫連接失敗</h2>";
    }
    ?>
	</form>
</div>
</div>
</div><br>
</div>

<script>
// Tabbed 讓我看看餐廳
function open讓我看看餐廳(evt, 讓我看看餐廳Name) {
  var i, x, tablinks;
  x = document.getElementsByClassName("讓我看看餐廳");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(讓我看看餐廳Name).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>
</body>
</html>