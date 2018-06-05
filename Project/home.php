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
</head>

<body>

<script>
	//顯示登入與否
	$(document).ready(function(){
		var eacc = localStorage.getItem('eacc');
		console.log('eacc='+eacc);
		console.log('hi');
		if(eacc != "" && eacc != null){//登入中
			document.getElementById("name").innerHTML = "Hello, "+eacc+"!";
			$(".login").hide();		
			$(".logout").show();		
		}
		else{//沒登入
			$(".login").show();
			$(".logout").hide();
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
    <a href="#讓我看看餐廳" class="w3-bar-item w3-button"><button class="w3-button  ">讓我看看餐廳</button></a>
    <a href="score.php" class="w3-bar-item w3-button"> <button class="w3-button">心得評論</button></a>
	<div class="w3-dropdown-hover w3-right">
    <a href="login.php" class="w3-bar-item w3-button login"> <button class="w3-button">登入</button></a>
	<label style="margin-top:10px;"class ="w3-bar-item logout" id ="name"> </label>
	<a href="home.php" onclick="logout();" class="w3-bar-item w3-button logout"> <button class="w3-button  ">登出</button></a>
    </div>
  </div>
</div>


	
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-xlarge">週末營運時間有所不同</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px"><strong>NCTU Restaurant</strong></span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>thin<br>CRUST 一餐</b></span>
    <!-- <p><a href="#讓我看看餐廳" class="w3-button w3-xxlarge w3-black"><button class="w3-button">讓我看看餐廳</button></a></p> -->
  </div>
</header>

<!-- 讓我看看餐廳 Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="讓我看看餐廳">
  <div class="w3-content">
  </div>

    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Restaurants</h1>

	
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
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

    <div id="一餐" class="w3-container 讓我看看餐廳 w3-padding-32 w3-white">
		
	<form action="restaurant_info.php" method="post">
	
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "group9_db";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_query($conn, "SET NAMES 'UTF8'");

    $sql ="SELECT rid,rname FROM restaurant WHERE rlocate=1";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
              //localStorage帳號名稱及密碼
              $rnum = $row[0];
              $name = $row[1];
              //console.log('rnum = '+rnum+' name = '+name);

              //$link="restaurant_info.php";
            echo "
              <input type=\"submit\" name=$rnum class=\"button1\" value=\"$name\">
                <hr>
                ";
      
        }
    }
    else{
      echo "<h2>資料庫連接失敗</h2>";
    }
	?>
	</form>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<?php
//隨機選餐廳
	//$sql ="SELECT rid,rname FROM restaurant WHERE rlocate=1";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
		$random = (rand()% 6)+1;
		$random = $random + 100;
		$varr=$_POST['display'];
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
              //localStorage帳號名稱及密碼
              $rnum = $row[0];
              $name = $row[1];
              //console.log('rnum = '+rnum+' name = '+name);
			
              //$link="restaurant_info.php";
			if($random == $rnum && isset($varr)){
            echo "選到餐廳：$name
			<input type=\"submit\" id=\"display\" name=\"display\" value=\"我想再換一個\" ><br />
			";
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
	<form action="restaurant_info.php" method="post">
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "group9_db";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_query($conn, "SET NAMES 'UTF8'");

    $sql ="SELECT rid,rname FROM restaurant WHERE rlocate=2";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
              //localStorage帳號名稱及密碼
              $rnum = $row[0];
              $name = $row[1];
                //console.log('rnum = '+rnum+' name = '+name);

                //$link="restaurant_info.php";

              echo"
              <a><input type=\"submit\" name=$rnum class=\"button1\" value=\"$name\"></a>
                <hr>
              ";
        }
    }
    else{
      echo "<h2>資料庫連接失敗</h2>";
    }
    ?>  
	</form>
    </div>


    <div id="女二" class="w3-container 讓我看看餐廳 w3-padding-32 w3-white">
	<form action="restaurant_info.php" method="post">
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "group9_db";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_query($conn, "SET NAMES 'UTF8'");

    $sql ="SELECT rid,rname FROM restaurant WHERE rlocate=3";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        //echo "<h2>拿到資料</h2>";
        while($row = $result->fetch_row()){//fetch_assoc():把傳出的資料分割好放入row這個array中
              //localStorage帳號名稱及密碼
              $rnum = $row[0];
              $name = $row[1];
                //console.log('rnum = '+rnum+' name = '+name);

                //$link="restaurant_info.php";

              echo"
              <a><input type=\"submit\" name=$rnum class=\"button1\" value=\"$name\"></a>
                <hr>
              ";
        }
    }
    else{
      echo "<h2>資料庫連接失敗</h2>";
    }
    ?>
	</form>
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
</html>