<!DOCTYPE html>
<html>
	


<?php  

session_start();



?>

<!––------------------------------------------------------------------------------------------------------------------------------------>
<!-- Linking the CSS and Javascript files -->

<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="javascript/script.js"></script>
	<title>Registration Page</title>
</head>


<!––------------------------------------------------------------------------------------------------------------------------------------>
<!-- Linking to other pages -->
<body>
	<div id="divide">
	<img src="logo.png"/>

	<a href="index.php">Home</a>

	<a href="results_Page.php">Results</a>

	<a href="item_Page.html">Item</a>

	<a href="registeration_Page.php">Register</a>
	</div>
	<br>

<!––------------------------------------------------------------------------------------------------------------------------------------>
<!-- Registeration process -->

	<div id="main">
		<h1>This Page Registers Users</h1>
		<form onsubmit="return validateRegister()" action="register.php" method="post">

		First Name: <input type="text" name="firstName" id="first name">  </input>
		<br>
		<br>

		Last Name: <input type="text" name="lastName" id="last name">   </input>
		<br>
		<br>
		
		Email: <input type="text" name="Email" id="Email"></input>
		<br>
		<br>

<!––------------------------------------------------------------------------------------------------------------------------------------>
<!-- Selecting State -->

		Select Country: <select name="country" id="country">
		<option value="none">-select one-</option>
		<option value="QLD">QLD</option>

		<option value="NSW">NSW</option>

		<option value="SA">SA</option>

		<option value="WA">WA</option>

		<option value="NT">NT</option>

		<option value="VIC">VIC</option>

		<option value="TAS">TAS</option>

		<option value="ACT">ACT	</option>
		</select>

		<br>
		<br>

<!––------------------------------------------------------------------------------------------------------------------------------------>

		Date of Birth: 
		<br>

		Day: <input type="number" name="day" id="day"></input>

		Month: <input type="number" name="month" id="month"></input>

		Year: <input type="number" name="year" id="year"></input>

		<br>
		<br>

<!––------------------------------------------------------------------------------------------------------------------------------------>

		Password: <input type="password" name="password" id="password"></input>
		<br>
		<br>

		Confirm Password: <input type="password" name="confirmPassword" id="confirm password"></input>
		<br>
		<br>

		<input type="submit" value="Register" name="Register"></input>
		<br>
		<br>
		</form>
	</div>
<!––------------------------------------------------------------------------------------------------------------------------------------>

</body>

<footer class="footer">

<p>Brisbane City Wifi. 2018.</p>

</footer>

</html>