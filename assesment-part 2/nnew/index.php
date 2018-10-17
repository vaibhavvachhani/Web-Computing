<!DOCTYPE html>
<html>
<?php 
session_start();
?>

<!–– Linking the CSS and Javascript files ––>       
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="javascript/script.js"></script>
	<title>Search your location</title>
</head>


<body>

<!–– Linking all the pages with each other ––>

	<div id="divide">
	<img src="logo.png"/>

	<a href="index.php">Home</a>

	<a href="results_Page.php">Results</a>

	<a href="item_Page.html">Item</a>

	<a href="registeration_Page.php">Register</a>
	</div>
	<br/>



	<div id="main">
		<h1>This is the main page of the website</h1>

		<form onsubmit="return validateSearch()" action="results_Page.php" method="post">
		Enter your Email <input type="text" name="email" id="email"></input>
		<br>
		<br>


		Enter your Password: <input type="text" name="password" id="password"></input>
		<br>
		<br>


		<br>
		<br>
		<input type="submit" value="submit"/>
		</form>
	</div>
	
	
	
<!–– Adding the Google Map ––>

	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d56637.39400679892!2d153.03557120000002!3d-27.4743296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sau!4v1525689649457" 
	width="600" height="450" frameborder="0" style="border:0" allowfullscreen>
	</iframe>

</body>

<footer class="footer">

<p>Brisbane City Wifi. 2018.</p>

</footer>

</html>	