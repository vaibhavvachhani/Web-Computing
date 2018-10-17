<?php
$store = filter_input(INPUT_POST, 'store');
$company = filter_input(INPUT_POST, 'company');
$price = filter_input(INPUT_POST, 'price');

$host= "localhost";
$dbusername= "root";
$dbpassword="vaibhav123!";
$dbname = "cars";

//connect to mySQL database

  $pdo = new PDO('mysql:host=localhost;dbname=$dbname', 'root', '$dbpassword'); 
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try
    {
    $sql = "SELECT * FROM vehicles WHERE make = :com";
    $stmt2 = $pdo->prepare($sql);
    $stmt2->bindParam(':com', $company);
    $stmt2->execute();
    $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
      die("ERROR: Could not execute $sql2. " . $e->getMessage());
    }
    foreach($results as $row)
      {
        echo "$row";
      }
    
}

?>