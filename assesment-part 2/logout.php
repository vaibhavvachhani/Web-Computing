<?php
session_start();
if (isset($_SESSION['isUser']))
{
  $_SESSION['isUser'] = false;
  unset($_SESSION['isUser']);
  header("Location: http://{$_SERVER['HTTP_HOST']}/search.php");
  exit();
}
else
{
  header("Location: http://{$_SERVER['HTTP_HOST']}/search.php");
  exit();
}
?>
