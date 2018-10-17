<?php
  // check user checks if the detials provided by the user already exists in the database and returs a boolean
  //registers user if false
  // connecting to MYSql database
  session_start();
  try
  {
    $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO reviews (userID, reviewText, rating, itemID, date)
            VALUES (:userID, :review, :rating, :itemID, :currentDate)";
    $stmt = $pdo->prepare($sql);
    date_default_timezone_set('Australia/Brisbane');
    $date = date('Y-m-d H:i:s', time());

    $stmt->bindParam(':userID', $_SESSION['user_id']);
    $stmt->bindParam(':review', $_POST['review']);
    $stmt->bindParam(':rating', $_POST['rating']);
    $stmt->bindParam(':itemID', $_POST['itemID']);
    $stmt->bindParam(':currentDate', $date);
    $stmt->execute();
  }
  catch(PDOException $e)
  {
      die("ERROR: Not able to execute $sql. " . $e->getMessage());
  }

  $idPage = $_POST['itemID'];
  $_SESSION['userID'] = $userID;
  header("Location: http://{$_SERVER['HTTP_HOST']}/item_page.php?id=$idPage");
  exit();
?>
