<!DOCTYPE html>
<?php  

session_start();

$pdo = new PDO('mysql:host=cab230.sef.qut.edu.au;dbname=n9896007', 'n9896007', 'password');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
$result = $pdo->prepare('SELECT * FROM items');
$result->execute();
} catch (PDOException $e) {
echo $e->getMessage();
}





?>
<html>

<!––------------------------------------------------------------------------------------------------------------------------------------>
<!-- Linking the CSS file -->

<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css?d=<?php echo time(); ?>">
	<title>Search Results Page</title>
</head>


<!––------------------------------------------------------------------------------------------------------------------------------------>
<!-- Linking the other pages -->

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
<!-- Brief information of the different places where Brisbane city council Wifis are -->
	
<h1>Welcome </h1>
		
		
<div id="results">	

 
 <?php  
 echo "<br>";	
	foreach($result as $b){
	echo "<div id='td'> <img src='Roma-Street-Parklands-Playground-7.jpg'>";
	echo "<h3>";
	echo $b['Name'];
	echo "</h3>";

	echo "<br> Co-ordinates: <br/> <h3>";
	echo $b['Longitude'];
	echo ","; 
	echo $b['Latitude'];
	echo "</h3>";

	echo "<br> Rating: <br/> <img id='rating' src='download.png'></img>";

	echo "<a href='itemPage.html'>More information</a>";	
	echo "</div>";
	}
	
	?>
<!––---------------------------------------------------------------------------------------->

<div id="td"> <img src="img16722.jpg">

	<br/><h3> Oriel Park </h3>	
	
	<br/> Co-ordinates: <br/> <h3> -27.429368, 153.057685 </h3>
	
	<br/> Rating: <br/> <img id="rating" src="download.png"></img>
	
	<a href="itemPage.html">More information</a> 

</div>


<!––---------------------------------------------------------------------------------------->


<div id="td"> <img src="queen-street-mall.jpg">

	<br/> <h3> Queens Street Mall </h3>
	
	<br/> Co-ordinates: <br/> <h3> -27.469382, 153.025197 </h3>
	
	<br/> Rating: <br/> <img id="rating" src="download.png"></img>
	
	<a href="itemPage.html">More information</a> 
	
</div>
</div>
</div>

<br><br>

<!––------------------------------------------------------------------------------------------------------------------------------------>
<!-- Logging Out -->

<a href="logout.html">Log out</a>

<br><br>


</body> 

<footer class="footer">

<p>Brisbane City Wifi. 2018.</p>

</footer>

</html>