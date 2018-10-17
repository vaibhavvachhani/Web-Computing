<?php
$bool1 = false;
$userID = 1;

function returnUser()
{
  // connecting to MYSql database
    $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
  //  $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try
    {
    $sql = "SELECT userID FROM members WHERE username = :username";
    $stmt2 = $pdo->prepare($sql);
    $stmt2->bindParam(':username', $_POST['username_login']);
    $stmt2->execute();
    $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
      die("ERROR: Could not execute $sql2. " . $e->getMessage());
    }
    if ($stmt2->rowCount() > 0)
    {
      foreach($results as $row)
      {
        $ID = $row['userID'];
      }
      return intval($ID);
    }
    return false;
}

function checkuser_signIn()
{
    // connecting to MYSql database
      $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
    //  $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      try
      {
      $sql = "SELECT username, password, userID FROM members WHERE username = :username";
      $stmt2 = $pdo->prepare($sql);
      $stmt2->bindParam(':username', $_POST['username_login']);
      $stmt2->execute();
      $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(PDOException $e)
      {
          die("ERROR: Could not execute $sql2. " . $e->getMessage());
          $GLOBALS['$bool1'] = false;
      }

      if ($stmt2->rowCount() > 0)
      {
        foreach($results as $row)
        {
          $hashed_password = $row['password'];
          $userID = $row['userID'];
          $user_password = $_POST['passwordLogin'];
          if(password_verify($user_password, $hashed_password))
          {
            $GLOBALS['$bool1'] = true;
          }
        }
      }
      else
      {
        $GLOBALS['$bool1'] = false;
      }

      return $GLOBALS['$bool1'];
}

  $bool = checkuser_signIn();
  $userID = returnUser();
  if($bool==true)
  {
    session_start();
    $_SESSION['isUser'] = true;
    $_SESSION['user_id'] = $userID;

    header("Location: http://{$_SERVER['HTTP_HOST']}/search.php");
    exit();
  }
  else
  {
    header("Location: http://{$_SERVER['HTTP_HOST']}/login.php");
  }
?>
