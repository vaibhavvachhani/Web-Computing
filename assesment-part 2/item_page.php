<!DOCTYPE html>

<head>
  <!-- Basic specifications, so the browser runs as we would like it to -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- In order: linking CSS, the font Raleway from google fonts, the fontawesome 'font', and our js  -->
  <link href="style.css" type="text/css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <script type="text/javascript" src="my.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsxNCFEgf3LyAFHoPiCctzF1y1OIeWjnM" type="text/javascript"></script>
  <title>Item Page</title>

  <!-- Untested so far, I don't have an iPhone -->
  <!-- iPhone -->
  <link rel="apple-touch-icon-precomposed" href="images/128pxicon.png"/>
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
      <h1><?php include 'item_data.php'; echo $loc; ?></h1>
      <!-- Encapsulates top network map which shows larger map of area than results -->
      <?php
        include 'item_data.php';
        echo '<div class="individualItemMap" itemscope itemtype="http://schema.org/Map">';
        echo '<div class="mapSearch" id="' .$id. '" itemprop="hasMap"></div>';
        echo '<script language="javascript">';
        echo 'initMapSearch(' . $lat . ', ' . $lng . ', ' .$id. ');';
        echo '</script>';
        echo '</div>';
      ?>
      <div class="individualBoxes" itemscope itemtype="http://schema.org/Place">
        <h3>Details</h3>
        <!-- Listbox contains lists, formatted well, visually, and a border -->
        <div class="listbox">
          <!-- List keeps list items organised -->
          <div class="list">
            <ul>
              <?php
              include 'item_data.php';
              echo '<li class="items"itemprop="name"> <b>Location Name</b>';
              echo $loc;
              echo '</li>';
              echo '<li class="items" itemscope itemtype="http://schema.org/PostalAddress" itemprop="address"><b>Address</b>';
              echo $add;
              echo '</li>';
              echo '<li class="items" itemscope itemtype="http://schema.org/PostalAddress" itemprop="address"><b>Suburb</b>';
              echo $sub;
              echo '</li>';
              echo '<li class="items"><b>Rating</b>';

              $avgRating = 0;
              $sum = 0;
              $amtRating = 0;
              $stars = "";

              foreach($ratings as $indvRating)
              {
                if($indvRating['itemID'] == $id)
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

              $currentAvg = $avgRating;
              for($i = 1; $i < 6; $i++)
              {
                if($currentAvg != 0.5)
                {
                  if($avgRating >= $i)
                  {
                    $stars = $stars . '<span class="fa fa-star checked"></span>';
                  }
                  else
                  {
                    $stars = $stars . '<span class="fa fa-star unchecked"></span>';
                  }
                }
                else
                {
                  $stars = $stars . '<span class="fa fa-star unchecked"></span>';
                  $stars = $stars . '<span class="fa fa-star-half stack"></span>';
                }
                $currentAvg = $currentAvg - 1;
              }
              echo $stars;
               ?>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Review page -->
      <div class="individualBoxes">
        <h3>User Reviews</h3>
        <div class="listbox">
          <ul>
            <?php
            // Debugging
              //echo var_dump($_SESSION);
            $lastRating = "";
              foreach($ratings as $indvRating)
              {
                  if($indvRating['reviewID'] != $lastRating)
                  {
                    foreach($members as $memberRow)
                    {
                      if($memberRow['userID'] == $indvRating['userID'])
                      {
                        $user = $memberRow['username'];
                        break;
                      }
                    }
                    echo '<li class="items" itemscope itemtype="http://schema.org/Review">';
                    echo '<div class="userName" itemprop="author">' . $user . '</div>';
                    echo '<div itemprop="reviewBody"><p>' . $indvRating['reviewText'] . '</p></div>';
                    echo '<div class="userName" itemprop="itemReviewed" content=' .$loc. '></div>';
                    echo '<div class="starContainer" itemprop="reviewRating" ratingValue=' . $indvRating['rating'] . '>';
                      $stars = "";
                      for($i = 1; $i < 6; $i++)
                      {
                        if ($indvRating['rating'] >= $i)
                        {
                          $stars = $stars . '<span class="fa fa-star checked"></span>';
                        }
                        else
                        {
                          $stars = $stars . '<span class="fa fa-star unchecked"></span>';
                        }
                      }
                      echo $stars;
                    echo '</div>';
                    echo '</li>';
                    $lastRating = $indvRating['reviewID'];
                  }
              }
            ?>
          </ul>
          <!-- Will allow a review, in the future -->
          <!-- Trigger/Open The Modal -->
          <input type="button" onclick="openPopup()" value="Write a review" id="reviewButton">
          <!-- The Modal -->
          <div id="popup" class="reviewPopup">
            <!-- Modal content -->
            <div class="popup-content">
            <?php
              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
              // define variables and set to empty values
              $reviewErr = null;
              $review =null;
              $rating = 5; //This, as well. 5 Here instead of the first value. Users are likely looking for the best spots.

              if ($_SERVER["REQUEST_METHOD"] == "POST")
              {
                if (empty($_POST["review"]) || empty($_POST["rating"]))
                {
                  $reviewErr = "Review is required";
                }
                else
                {
                  $review = test_input($_POST["review"]);
                  if (!preg_match("/^[a-zA-Z0-9\. ]*$/",$review))
                  {
                    $reviewErr = "The review you entered is invalid!";
                  }
                  $rating = test_input($_POST["rating"]);
                  if (!preg_match("/^[1-5]*$/\. ",$rating))
                  {
                    $ratingrr = "The review you entered is invalid!";
                  }
                }
              }
            ?>
              <span class="close" onclick="closePopup()"><p>Close</p><i class="fas fa-times"></i></span>
              <form onsubmit="return review_submit()" method="post" name="review_form" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <?php echo '<input type="hidden" value="' . $id . '" name="itemID" id="itemID">'; ?>
              <?php require "userPermissionReview.php"; ?>
              </form>
            </div>
          </div>
          <br>
        </div>

        <br>
        <br>

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
