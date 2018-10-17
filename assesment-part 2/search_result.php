<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic specifications, so the browser runs as we would like it to -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- In order: linking CSS, the font Raleway from google fonts, and the fontawesome 'font'  -->
  <link href="style.css" type="text/css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <script src="my.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsxNCFEgf3LyAFHoPiCctzF1y1OIeWjnM" type="text/javascript"></script>
  <title>Results</title>

  <!-- Untested so far, I don't have an iPhone -->
  <!-- iPhone -->
  <link rel="apple-touch-icon-precomposed" href="images/128pxicon.png" />
  <link rel="apple-touch-startup-image" href="images/iSplash.png" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

  <!-- Android prior to M39 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="128x128" href="128pxicon.png">
  <!-- Android past M39 -->
  <link rel="manifest" href="manifest.json">
</head>

<body>
  <!-- Contaner div encapsulates the whole page, used to determine footer (end) placement -->
  <div class="container">
    <!-- Header. H1, Logo, and major page links organised within the menu_items class -->
    <div id="header">
      <a href="search.php" class="individual">
        <h1>Connectr</h1>
        <img src="images/128pxicon.png" alt="Logo">
      </a>
      <div class="menu_items">
        <?php
        require "userPermission.php";
        ?>
      </div>
    </div>
    <!-- Content div for main content of page, goes to end of content. Keeps all main content in a window, for footer (bottom) placement.  -->
    <div id="content">

      <h1>Search Results</h1>
      <!-- Grid container organises a pseudo-grid of results_container divs  -->
      <div id="grid_container">
        <!-- Results container holds the image (results_container), and details (results_box) of the individual search results -->
        <div class="overallMapFont">
          <h2>Overall Results</h2>
          <div class="overallMap" id="overallMap">
          </div>
          <div class="divider_results"></div>
        </div>
        <?php
          include 'searchData.php';
          //echo'<div class="test">';
          //echo'<div class="test  language="javascript" id="totalMap"></div>';
          //echo'</div>';
          function coordinateDistance($latOrigin, $lngOrigin, $latMarker, $lngMarker)
          {
            // convert from degrees to radians
            $latO = deg2rad($latOrigin);
            $lonO = deg2rad($lngOrigin);
            $latM = deg2rad($latMarker);
            $lonM = deg2rad($lngMarker);

            $latD = $latM - $latO;
            $lonD = $lonM - $lonO;
            $a = 2 * asin(sqrt(pow(sin($latD / 2), 2) + cos($latO) * cos($latM) * pow(sin($lonD / 2), 2)));
            return ($a * 6371);
          }

          foreach($results as $row)
          {
            $loc = $row['locationName'];
            $add = $row['address'];
            $sub = $row['suburb'];
            $itemID = intval($row['itemID']);
            $latitude = $row['latitude'];
            $longitude = $row['longitude'];
            $userCoords =  $_GET['location'];
            $userCoords = explode(',' , $userCoords);

            $avgRating = 0;
            $sum = 0;
            $amtRating = 0;
            $overAllMapArray;

            $pass = true;
            if(!empty($_GET['location']))
            {
              $distance = coordinateDistance($userCoords[0], $userCoords[1], $latitude, $longitude);
              if($distance < 3.5)
              {
                $pass = true;
              }
              else
              {
                $pass = false;
              }
            }
            foreach($ratings as $indvRating)
            {
              if($indvRating['itemID'] == $row['itemID'])
              {
                $currentRating = intval($indvRating['rating']);
                $sum = $sum + $currentRating;
                $amtRating = $amtRating + 1;
              }
            }
            if($sum > 0)
            {
              $avgRating = round(($sum / $amtRating) * 2) / 2;
            }

            /*$continue = true;
            if($location != "")
            {
              $distanceFromSpecified = distance;
              if($distanceFromSpecified > 5000)
              {
                $continue = false;
              }
            } */
            if($avgRating >= $rating && $pass == true)
            {
            //  echo'<script>totalMap(' . $latitude . ', ' . $longitude . ', ' .$itemID. ');</script>';
              $url = "item_page.php?id=$itemID";
              echo'<div class="results_container">';
                echo'<div class="results_img_box">';
                echo'<div class="mapSearch" id="' .$itemID. '"></div>';
                echo '<script language="javascript">';
                echo 'initMapSearch(' . $latitude . ', ' . $longitude . ', ' .$itemID. ');';
                echo '</script>';
                echo'</div>';
                echo'<div class="results_box">';
                  echo'<h2>' . $loc . '</h2>';
                  echo'<p><b>Address</b>' . $add . '</p>';
                  echo'<p><b>Suburb</b>' . $sub . '</p>';
                  echo'<p><b>Star Rating</b>';
                    echo'<!-- Using Font Awesome for stars. There are five stars in a star rating, however six appear here.';
                         echo'The stack classed star is actually a half-star, on top of an unchecked star, to appear as a 1/2 rating  -->';
                    $currentAvg = $avgRating;
                    for($i = 1; $i < 6; $i++)
                    {
                      if($currentAvg != 0.5)
                      {
                        if($avgRating >= $i)
                        {
                          echo'<span class="fa fa-star checked"></span>';
                        }
                        else
                        {
                           echo'<span class="fa fa-star unchecked"></span>';
                        }
                      }
                      else
                      {
                        echo'<span class="fa fa-star unchecked"></span>';
                        echo'<span class="fa fa-star-half stack"></span>';
                      }
                      $currentAvg = $currentAvg - 1;
                    }
                  echo'</p>';
                  echo'<br>';
                  echo'<a href="' . $url . '" class="individual"><input type="submit" value="View Item"></a>';
                echo'</div>';
              echo'</div>';
              echo'<div class="divider_results"></div>';
                $overAllMapArray[] = [$loc, $add, $sub, $avgRating, $url, $latitude, $longitude];
              }
          }
          if(!empty($overAllMapArray))
          {
            echo '<script language="javascript">overallMapCreate(' .json_encode($overAllMapArray) . ');</script>';
          }
          else
          {
            echo '<script language="javascript">document.getElementById("overallMap").className = "noOverallMap";</script>';
          }
        ?>
          <div class="searchLink">
            <h1>Nothing here, or not what you're looking for?</h1>
            <a href="search.php">Back to search.</a>
          </div>
      </div>

    </div>

    <!-- Footer placed after content, and container divs. Container div acts as the start of the footer, the container being the end
         this means the footer is always on the bottom -->
    <div id="footer">
      <h1>Connectr</h1>
      <img src="images/128pxicon.png" alt="Logo">
      <div class="menu_items">
        <a href="search.php">Search</a>
      </div>
    </div>
  </div>
</body>

</html>
