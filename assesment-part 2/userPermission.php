<?php
session_start();
if (!isset($_SESSION['isUser']))
{
  //Session not set
  echo '<a href="login.php">Log In/Register</a><a href="search.php">Search</a>';
}
else
{
  //Session set
  echo '<a href="logout.php">Log Out</a><a href="search.php">Search</a>';
}

?>
