<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="login_styles.css">

</head>

<body style="background-color:black;">


<div>
<h1>評分留言</h1>
	<form  onsubmit="return checkform()" action="score_submit.php" method="post" name="scoreform">
		<p><span class="error">* required field</span></p>
			
			<label>帳號:</label><span class="error">* </span><br>
			<input type="text" name="eacc"> 
			<!--
			-->
			<br>

			<label>評分餐廳: </label><span class="error">*</span><br>
			
			<label class="radio"><input type="radio" name="srid" value="101">  非羹不可</label>
			<label class="radio"><input type="radio" name="srid" value="102">  好食佳餐房</label>
			<label class="radio"><input type="radio" name="srid" value="103">  隆太郎名廚燒臘</label>
			<label class="radio"><input type="radio" name="srid" value="104">  陳隆滷味</label>
			<label class="radio"><input type="radio" name="srid" value="105">  華記快餐</label>
			<label class="radio"><input type="radio" name="srid" value="106">  萊爾富便利店</label>
			<label class="radio"><input type="radio" name="srid" value="201">  7-11</label>
			<label class="radio"><input type="radio" name="srid" value="202">  中式早餐</label>
			<label class="radio"><input type="radio" name="srid" value="203">  自助餐</label>
			<label class="radio"><input type="radio" name="srid" value="204">  米克Q</label>
			<label class="radio"><input type="radio" name="srid" value="205">  紅鼎香滷味燙</label>
			<label class="radio"><input type="radio" name="srid" value="206">  姊妹飯桶</label>
			<label class="radio"><input type="radio" name="srid" value="207">  MorningHouse</label>
			<label class="radio"><input type="radio" name="srid" value="208">  八方雲集</label>
			<label class="radio"><input type="radio" name="srid" value="209">  漢城烤肉飯</label>
			<label class="radio"><input type="radio" name="srid" value="210">  和風風味屋</label>
			<label class="radio"><input type="radio" name="srid" value="211">  素食部</label>
			<label class="radio"><input type="radio" name="srid" value="212">  水果部</label>
			<label class="radio"><input type="radio" name="srid" value="213">  快餐麵食部</label>
			<label class="radio"><input type="radio" name="srid" value="214">  多多咖啡廳</label>
			<label class="radio"><input type="radio" name="srid" value="215">  教職員工自助餐</label>
			<br>
			<label>評分:</label><span class="error">* </span><br>
			<label class="radio"><input type="radio" name="srate" value="1">  1</label>
			<label class="radio"><input type="radio" name="srate" value="2">  2</label>
			<label class="radio"><input type="radio" name="srate" value="3">  3</label>
			<label class="radio"><input type="radio" name="srate" value="4">  4</label>
			<label class="radio"><input type="radio" name="srate" value="5">  5</label>
			
			<br>
			<label>留言:</label><span class="error">* </span><br>
			<input type="text" name="sdetail">
			<br>
			
			<br>
			<input type="submit">
	</form>
</div>
<script>
	function checkform(){
		//evt.preventDefault();
		var myForm = document.scoreform;
		var condition = true;
		
		if(myForm.eacc.value==""){
			alert("請輸入帳號");
			myForm.eacc.focus();
			condition = false;
		}
		else if(myForm.srid.value==""){
			alert("請選擇評分餐廳");
			myForm.srid.focus();
			condition = false;
		}
		else if(myForm.srate.value==""){
			alert("請選擇評分高低");
			myForm.srate.focus();
			condition=false;
		}
		else if(myForm.sdetail.value==""){
			alert("請輸入留言");
			myForm.sdetial.focus();
			condition=false;
		}

		
		if(condition == false) return false;
		else return true;
	}
	

</script>

</body>
</html>
