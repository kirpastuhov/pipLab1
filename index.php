<!DOCTYPE html PUBLIC "-//W3C//Ddiv HTML 4.01 divansitional//RU"
"http://www.w3.org/div/html4/loose.ddiv">
<html>
	<head>
			<meta charset="utf-8" />
		<title>Lab №1</title>
		<style>
			body, html {
				text-align: center;
				overflow:  hidden;
				padding: 0;
				margin: 0;
				background-color: #b4b4b4;
				height:100%;
		    font-family: Monospace;
		    font-size: 19pt;
			}
			.inputs {
				text-align: center;
				display: block;
			  width: 50%;
			  position: fixed;
				padding-bottom: 10px;
			  padding-top: 10px;
			}
			.graph {
				text-align: center;
				margin-top: 50px;
			}
			.sharp {
			border-radius: 0px;
			}
			.btn-submit {
			color: Black;
			font-size: 24px;
			padding: 15px 71px;
			background-color: rgba(180, 180, 180, 0.7);
			border-color: Black;
			}
			.btn-submit:hover{
				background-color: rgba(195, 195, 195, 0.7);
			}
			.btn-submit:active{
				background-color: SlateGrey; /* Цвет кнопки при нажатии */
			}
		</style>
	</head>
	<body>

			<h3>Пастухов Кирилл Р3118 Вариант 28813</h3>
			<form method="POST" action="script.php" onsubmit="return Validate()" name="input_form" >
				<div id="inputs">
					<div id="x_div">
						Input X
						<input type="number" step="1"  min="-4" max="4" name='inputX' id='inputX' size="4"  value="<?php echo htmlspecialchars($_POST['inputX']); ?>">
						<div id="x_error"></div>
					</div>
					<div id="y_div">
						Input Y
						<input type="text" name="inputY" size="4"  value="<?php echo htmlspecialchars($_POST['inputY']); ?>">

						<div id="y_error"></div>
					</div>
					<div id="r_div">
						Input R
						<select name="inputR" id="inputR">
								<option value='1'>1</option>
								<option value='1.5'>1.5</option>
								<option value='2'>2</option>
								<option value='2.5'>2.5</option>
								<option value='3'>3</option>
						</select>

						<div id="r_error"></div>
					</div>


			<div class="graph">
					Graph:<br> <img src="graph.jpg">
			</div>

			<div class="submit">
						<button name="btn" type="submit" class="btn-submit sharp" value="False">Submit</button>
			</div>

			<div>

			</div>
		</form>
</div>

		<script>
		var x = document.forms['input_form']['inputX'];
		var y = document.forms['input_form']['inputY'];
		var r = document.forms['input_form']['inputR'];

		// var x = document.getElementById("inputX").value;
		// var y = document.getElementById("inputY").value;
		// var r = document.getElementById("inputR").value;

		// SELECTING ALL ERROR DISPLAY ELEMENTS
		var x_error = document.getElementById('x_error');
		var y_error = document.getElementById('y_error');
		var r_error = document.getElementById('r_error');

		// alert(parseInt(x.value));
		// alert(parseInt(y.value));
		// alert(parseInt(r.value));

		// SETTING ALL EVENT LISTENERS
		x.addEventListener('blur', xVerify, true);
		y.addEventListener('blur', yVerify, true);
		x.addEventListener('blur', rVerify, true);
		// validation function
		function Validate() {
		  var parsed_X = parseInt(x.value);
		  var parsed_Y = parseInt(y.value);
		  var parsed_R = parseInt(r.value);
		  // validate x
		  if (x.value == '') {
		    x.style.border = "1px solid red";
		    document.getElementById('x_div').style.color = "red";
		    x_error.textContent = "X is required";
		    x.focus();
		    return false;
		  }
		  if (y.value == "") {
		    y.style.border = "1px solid red";
		    document.getElementById('y_div').style.color = "red";
		    y_error.textContent = "Y is required";
		    y.focus();
		    return false;
		  }
			if (isNaN(parsed_Y)) {

		    y.style.border = "1px solid red";
		    document.getElementById('y_div').style.color = "red";
		    y_error.textContent = "Y must be a number";
		    y.focus();
		    return false;
		  }
		  if (parsed_Y < -5 || parsed_Y > 3) {

		    y.style.border = "1px solid red";
		    document.getElementById('y_div').style.color = "red";
		    y_error.textContent = "Y must be in range [-5;3]";
		    y.focus();
		    return false;
		  }

		}
		// event handler functions
		function xVerify() {
		  if (x.value != "") {
		   x.style.border = "1px solid #5e6e66";
		   document.getElementById('x_div').style.color = "#5e6e66";
		   x_error.innerHTML = "";
		   return true;
		  }
		}
		function yVerify() {
		  if (y.value != "") {
		  	y.style.border = "1px solid #5e6e66";
		  	document.getElementById('y_div').style.color = "#5e6e66";
		  	y_error.innerHTML = "";
		  	return true;
		  }
		}
		function rVerify() {
		  if (r.value != "") {
		  	r.style.border = "1px solid #5e6e66";
		  	document.getElementById('r_div').style.color = "#5e6e66";
		  	r_error.innerHTML = "";
		  	return true;
		  }
		}
		</script>
	</body>
</html>
