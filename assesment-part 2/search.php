<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic specifications, so the browser runs as we would like it to -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- In order: linking CSS, the font Raleway from google fonts, the fontawesome 'font', our js, and the google maps API for address fetching -->
  <link href="style.css" type="text/css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <script src="my.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsxNCFEgf3LyAFHoPiCctzF1y1OIeWjnM" type="text/javascript"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Search</title>

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
      <h1>Search for WiFi networks, in your area!</h1>
      <div id="search_box">
        <?php
            // define variables and set to empty values
            $nameErr = $locationErr = $suburbErr = $ratingErr = null;
            $name = $location = null;
            $suburb = 0000; // This has to be defined, dropdown.
            $rating = 5; //This, as well. 5 Here instead of the first value. Users are likely looking for the best spots.

            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
              $name = test_input($_POST["netName"]);
              if (!preg_match("/^[a-zA-Z0-9_\.\(\)\-\, ]*$/",$name))
              {
                $nameErr = "Network name is invalid!";
              }

              $locationName = test_input($_POST["locname"]);
              if (!preg_match("/^[a-zA-Z0-9_\.\(\)\-\,\& ]*$/",$locationName))
              {
                $locationErr = "Location is invalid!";
              }

              $suburb = test_input($_POST["suburb"]);
              if (!preg_match("/^[0-9]*$/",$suburb))
              {
                $suburbErr = "Suburb is invalid!";
              }

              $rating = test_input($_POST["rating"]);
              if (!preg_match("/^[0-5]$/",$rating))
              {
                $ratingErr = "Rating is invalid!";
              }
            }

            function test_input($data)
            {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
        ?>
          <form name="search" onsubmit="return validateSearch()" method="post" action=" <?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
            <!-- Search box div above is dynamic and keeps things organised. Script to search above, but not used. -->
            <!-- As above, so below for rest of inputs -->
            <label for="netName">Network Name</label>
            <span class="error-server"><?php echo $nameErr;?></span>
            <span id="networkMissing" class="error-message">Network Name is invalid</span>
            <p class="hintText">Enter the name of the network</p>
            <input type="text" value="<?php echo $name; ?>" id="netName" name="netName" placeholder="Network name" onchange="hide1()">
            <!-- Input has type, id, name, and a greyed placeholder name -->
            <!-- Executes thes script to retrieve user's address on click, fills the locname box -->
            <div class="geolocation-container">
              <label for="locname">Location</label>
              <span class="error-server"><?php echo $locationErr;?></span>
              <span id="locationMissing" class="error-message">Location invalid</span>
              <p class="hintText">Area of hotspot search</p>
              <input type="text" value="<?php echo $location; ?>" id="locname" name="locname" placeholder="Location name">
              <button type="button" value="Determine automatically" onclick="getLocation();"><i class="fas fa-map-marker-alt"></i></button>
            </div>

            <label for="suburb">Suburb</label>
            <span class="error-server"><?php echo $suburbErr;?></span>
            <span id="suburbMissing" class="error-message">Suburb invalid</span>
            <p class="hintText">Select the suburb</p>
            <select id="suburb" name="suburb" class="dropdown" value="<?php echo $suburb; ?>">
            <option value=0000>Unselected</option>
            <!-- autofill -->
            <?php
            include 'fetchItems.php';
            $suburbList =array();
            $postcodeList = array();
            foreach ($result as $item)
            {
              $inList = true;
              if(count($suburbList) === 0)
              {
                $suburbList[] = $item['suburb'];
              }
              else
              {
                foreach($suburbList as $currentItem)
                {
                  if ($item['suburb'] == $currentItem)
                  {
                    $inList = false;
                    break;
                  }
                }
                if($inList == true)
                {
                  $suburbList[] = $item['suburb'];
                }
                $inList = false;
              }
            }
            sort($suburbList);

            include 'fetchItems.php';

            $sth = $pdo->prepare('SELECT suburb, postcode FROM items');
            $sth->execute();
            $resultDB = $sth->fetchAll();

            foreach ($suburbList as $suburbCheck)
            {
              foreach ($resultDB as $item)
              {
                if($item['suburb'] == $suburbCheck)
                {
                  $postcodeList[] = $item['postcode'];
                  break;
                }
              }
            }

            for ($x = 0; $x < count($suburbList); $x++)
            {
              echo "<option value=". $postcodeList[$x] .">". $suburbList[$x] ."</option>";
            }
            ?>
          </select>

            <label for="rating">Rating</label>
            <span class="error-server"><?php echo $ratingErr;?></span>
            <span id="ratingMissing" class="error-message">Rating invalid</span>
            <p class="hintText">Select the minimum rating. Note: Hotspots with no reviews will show, if no minimum rating is picked</p>
            <select id="rating" name="rating" class="dropdown" value="<?php echo $rating; ?>">
              <option value=0>No minimum</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
          </select>
            <!-- <button type="submit" value="Search"><i class="fas fa-search"></i>Search</button> -->
            <input type="submit" value="Search">
          </form>
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
