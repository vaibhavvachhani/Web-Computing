<?php
  $networkName = rawurlencode($_POST['netName']);
  $locationName = rawurlencode($_POST['locname']);
  $suburb = rawurlencode($_POST['suburb']);
  $rating = rawurlencode($_POST['rating']);
  //$encodedUrl = rawurlencode ( "http://{$_SERVER['HTTP_HOST']}/search_result.php?=' . $networkName . '&=' . $locationName . '&=' . $suburbName . '&=' . $rating . '" );
  $encodedUrl = "search_result.php?name=$networkName&location=$locationName&suburb=$suburb&rating=$rating";
  header("Location:$encodedUrl");
  die();
?>
