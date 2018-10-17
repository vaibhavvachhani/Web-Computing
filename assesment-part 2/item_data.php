<?php
  $loc = $add = $sub = null;
  // connecting to MYSql database
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = 'SELECT itemID FROM items'; //change the number to $_POST[itemID] or something
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!(empty($_GET)))
    {
      $id = $_GET['id'];
    }
    else
    {
      $id = 0;
    }
    $id = trim($id);
    $id = stripslashes($id);
    $id = htmlspecialchars($id);
    $error = 0;
    if(!preg_match("/^[0-9]*$/",$id) || ($id > count($results)) || ($id == 0))
    {
      $id = 0;
      $error = 1;
      echo "The ID given is not valid";
    }

    $sql = "SELECT locationName, address, suburb, latitude, longitude FROM items WHERE itemID =$id"; //change the number to $_POST[itemID] or something
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $row) {
        $loc = $row['locationName'];
        $add = $row['address'];
        $sub = $row['suburb'];
        $lat = $row['latitude'];
        $lng = $row['longitude'];
    }
    $ratingSQL =  "SELECT reviewID, itemID, rating, reviewText, userID FROM reviews WHERE itemID =$id";
    $stmt = $pdo->prepare($ratingSQL);
    $stmt->execute();
    $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $membersSQL = "SELECT * FROM members";
    $stmt = $pdo->prepare($membersSQL);
    $stmt->execute();
    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

  } catch(PDOException $e){
    die("ERROR: Not able to execute $sql. " . $e->getMessage());
  }
?>
