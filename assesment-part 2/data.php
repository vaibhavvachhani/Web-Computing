<?php
include 'checkuser.php';
$bool = checkuser();
// check user checks if the detials provided by the user already exists in the database and returs a boolean
if ($bool==true)
      {
        header("Location: http://{$_SERVER['HTTP_HOST']}/login.php");
        exit();
      }
else  {
        //registers user if false
        // connecting to MYSql database
        $pdo = new PDO('mysql:host=localhost;dbname=assignment', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
        $sql = "INSERT INTO members (username, email, phonenumber, dateofbirth, password)
                VALUES (:username, :emailaddress, :phonenum, :birthday, :pass)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $_POST['login']);
        $stmt->bindParam(':emailaddress', $_POST['mail']);
        $stmt->bindParam(':phonenum', $_POST['phone']);
        $stmt->bindParam(':birthday', $_POST['datebirth']);
        $hashed = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $stmt->bindParam(':pass', $hashed);
        $stmt->execute();
        } catch(PDOException $e){
            die("ERROR: Not able to execute $sql. " . $e->getMessage());
        }

        try{
        $sql = "SELECT userID FROM members WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $_POST['login']);;
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            die("ERROR: Not able to execute $sql. " . $e->getMessage());
        }

        foreach($results as $indv)
        {
          $userIDnew = $indv['userID'];
        }

        session_start();
        $_SESSION['isUser'] = true;
        $_SESSION['user_id'] = $userIDnew;

        header("Location: http://{$_SERVER['HTTP_HOST']}/search.php");
        exit();
      }
?>
