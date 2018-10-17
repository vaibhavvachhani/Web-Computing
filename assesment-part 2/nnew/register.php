<?php

	session_start();

	$pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', 'vaibhav123!');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {
	$result = $pdo->prepare(' INSERT INTO members (First_Name, Last_Name,Email, Country, Day, Month, Year, Password, Confirm_Password)
    VALUES (:First_Name, :Last_Name, :Email, :Country, :Day, :Month, :Year, :Password, :Confirm_Password) ');
  $result->bindParam(':First_Name', $_POST['firstName']);
	$result->bindParam(':Last_Name', $_POST['lastName']);
	$result->bindParam(':Email', $_POST['Email']);
	$result->bindParam(':Country', $_POST['country']);
	$result->bindParam(':Day', $_POST['day']);
	$result->bindParam(':Month', $_POST['month']);
	$result->bindParam(':Year', $_POST['year']);
	$result->bindParam(':Password', $_POST['password']);
	$result->bindParam(':Confirm_Password', $_POST['confirmPassword']);
	$result->execute();
	} catch (PDOException $e) {
	echo $e->getMessage();
	}
  header("Location: http://{$_SERVER['HTTP_HOST']}/index.php");
	$_SESSION['email'] = $email;
	$_SESSION['success'] = "Logged in";






?>
