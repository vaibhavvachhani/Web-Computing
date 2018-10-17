<?php
$bool1 = true;
function checkuser()
{
  try
  {
    // connecting to MYSQL database
    $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //returns username, email or phonenumber submitted by users if it already exists in the database
    $sql2 = "SELECT username, email, phonenumber FROM members WHERE username = :username_2 or email = :emailaddress_2 or phonenumber = :phonenum_2";
    $stmt2 = $pdo->prepare('SELECT username, email, phonenumber FROM members WHERE username = :username_2 or email = :emailaddress_2 or phonenumber = :phonenum_2');
    //binding parameters to the users' input to avoid injection attacks
    $stmt2->bindParam(':username_2', $_POST['login']);
    $stmt2->bindParam(':emailaddress_2', $_POST['mail']);
    $stmt2->bindParam(':phonenum_2', $_POST['phone']);
    $stmt2->execute();
    }
    catch(PDOException $e)
    {
      die("ERROR: Could not execute $sql2. " . $e->getMessage());
      $bool1 = false;
    }
    //if the results have more than 0 rows, it means it already exists.
    if ($stmt2->rowCount() > 0)
    {
      $bool1 = true;
    }
    else
    {
      $bool1 = false;
    }
    return $bool1;
}
?>
