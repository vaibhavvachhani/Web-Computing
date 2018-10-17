<?php
  $loc = $add = $sub = null;
  // connecting to MYSql database
  try
  {
    $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!(empty($_GET)))
    {
      $name = $_GET['name'];
      $location = $_GET['location'];
      $suburb = $_GET['suburb'];
      $rating = $_GET['rating'];
    }
    else
    {
      $name = "";
      $location = "";
      $suburb = "";
      $rating = "";
    }
    $sql = "SELECT * FROM items WHERE"; //add rating

    $vars = 0;
    $params = array();
    if ($name != "" || $suburb != "0000")
    {
      if($name != "")
      {
        $sql .= " locationName LIKE ?";
        $vars = $vars+1;
        $params[] = "%$name%";
      }

      if($suburb != "0000")
      {
        if($vars >= 1)
        {
          $sql .= "OR postcode = ?";
        }
        else
        {
          $sql .= " postcode = ?";
        }
        $suburb = intval($suburb);
        $params[] = "$suburb";
      }
      $stmt = $pdo->prepare($sql);
      $stmt->execute($params);
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {
      $sql = "SELECT * FROM items";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $ratingSQL =  "SELECT itemID, rating FROM reviews";
    $stmt = $pdo->prepare($ratingSQL);
    $stmt->execute();
    $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  catch(PDOException $e)
  {
    die("ERROR: Not able to execute $sql. " . $e->getMessage());
  }
?>
