<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic specifications, so the browser runs as we would like it to -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- In order: linking CSS, the font Raleway from google fonts, the fontawesome 'font', and our js  -->
  <link href="style.css" type="text/css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <script type="text/javascript" src="my.js"></script>
  <title>Log In/Register</title>

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
      <h1>Welcome!</h1>
      <!-- Login container is a dynamic container, which scales login boxes appropriately -->
      <div id="login_container">
        <h2>Login</h2>
        <!-- Login box, attached to a (not yet existent) server submission script -->
        <div class="login_box">
          <?php
          // define variables and set to empty values
          $nameErr1 = $passwordErr1 =  null;
          $name1 = $pass1 = null;

          //set error variables and values after validating the input
          if ($_SERVER["REQUEST_METHOD"] == "POST")
          {
            if (empty($_POST["username_login"]))
            {
              $nameErr1 = "Username is required";
            }
            else
            {
              $name1 = test_input($_POST["username_login"]);
              if (!preg_match("/^[a-zA-Z0-9]*$/",$name1) || strlen($name1) < 6)
              {
                $nameErr1 = "Username is invalid!";
              }
            }
            if (empty($_POST["passwordLogin"]))
            {
              $passwordErr1 = "Password is required!";
            }
            else
            {
              $pass1 = test_input($_POST["passwordLogin"]);
              if ( strlen($pass1) < 6) {
                $passwordErr1 = "password is invalid!";
              }
            }
          }
          ?>
            <form onsubmit="return validateLogin()" name="login_user" method="post" action=" <?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
              <!-- Labels are used for inputs, keeps them together, and organised, -->
              <!-- Type of input, id of input, name, and greyed placeholder text for instructions -->
              <label for="username_login">Username</label>
              //span error messages for server side and client side validation
              <span class="error-server">* <?php echo $nameErr1;?></span>
              <span id="usernameMissingLogin" class="error-message">Username is incorrect</span>
              <input type="text" id="username_login" value="<?php echo $name1; ?>" name="username_login" placeholder="Username" title="Enter your username - minimum 6 characters, maximum 16 with no symbols or special characters except _ " onchange="hideL()">

              <label for="passwordLogin">Password</label>
              //span error messages for server side and client side validation
              <span class="error-server">* <?php echo $passwordErr1;?></span>
              <span id="passmissingLogin" class="error-message">Password is incorrect</span>
              <input type="password" id="passwordLogin" name="passwordLogin" placeholder="Password" title="Enter your password - minimum 6 characters, maximum 16 with no symbols or special characters except _ " onchange="hideP()">

              <input type="submit" value="Login">
            </form>
        </div>
        <div class="divider"></div>
        <h2>Register</h2>
        <div class="login_box">
          <!-- When the submit button is pressed, run validate() function -->
          <?php
            // define variables and set to empty values
            $nameErr = $emailErr = $phonenumberErr = $bdayErr = $passwordErr =  null;
            $name = $email = $phonenumber = $bday = null;

            //set error variables and values after validating the input
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {

              if (empty($_POST["login"]))
              {
                $nameErr = "Username is required";
              }
              else {
                $name = test_input($_POST["login"]);
                if (!preg_match("/^[a-zA-Z0-9]*$/",$name))
                {
                  $nameErr = "Username is invalid!";
                }
              }

              if (empty($_POST["mail"]))
              {
                $emailErr = "Email is required";
              }
              else
              {
                $email = test_input($_POST["mail"]);
                //Uses https://www.regular-expressions.info/email.html, slightly modified for our purposes
                if (!preg_match("/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b{3,7}/i",$email))
                {
                  $emailErr = "Email is invalid!";
                }
              }

              if (empty($_POST["phone"])) {
                $phonenumberErr = "Phone number is required";
              } else {
                $phonenumber = test_input($_POST["phone"]);
                if (!preg_match("/^\d{10}$/",$phonenumber)) {
                  $phonenumberErr = "Phonenumber is invalid!";
                }
              }

              if (empty($_POST["datebirth"]))
              {
                $bdayErr = "Birthdate is required";
              }
              else
              {
                $bday = test_input($_POST["datebirth"]);
              //  if (!preg_match("/^(0[1-9]|[12][0-9]|3[01])[-/](0[1-9]|1[012])[-/](18|19)\d\d$/",$bday)) {
              //    $bdayErr = "Date of birth is invalid!";
              //  }
              }
              if (empty($_POST["password1"]) || empty($_POST["passConfirm"]) )
              {
                $passwordErr = "Passwords is required";
              }
              else
              {
                  $pass1 = test_input($_POST["password1"]);
                  $pass2 = test_input($_POST["passConfirm"]);
                  if($pass1!=$pass2)
                  {
                  $passwordErr = "Password do not match!";
                  }
              }
            }
          ?>
            <form name="register" onsubmit="return validate()" method="post" action=" <?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
              <!-- Labelled. Span displayed for input which has not been validated after submission. Title provides details when hovered over box
                 Same for all inputs followung. -->
              <label for="username1">Username</label>
              <!--span error messages for server side and client side validation -->
              <span class="error-server">* <?php echo $nameErr;?></span>
              <span id="usernameMissing" class="error-message">Username is invalid</span>
              <input type="text" value="<?php echo $name; ?>" id="username1" name="login" placeholder="Username" title="Enter your username - minimum 6 characters, maximum 16 with no symbols or special characters except _ " onchange="hide1()">

              <label for="email">Email</label>
              <!--span error messages for server side and client side validation-->
              <span class="error-server">* <?php echo $emailErr;?></span>
              <span id="emailInvalid" class="error-message">E-mail is invalid</span>
              <input type="email" value="<?php echo $email; ?>" id="email" name="mail" placeholder="Email address" title="Enter your QUT email address" onchange="hide2()">

              <label for="phoneno">Phone Number</label>
              <!--span error messages for server side and client side validation-->
              <span class="error-server">* <?php echo $phonenumberErr;?></span>
              <span id="phoneInvalid" class="error-message">Phone number is invalid</span>
              <input type="text" value="<?php echo $phonenumber; ?>" id="phoneno" name="phone" placeholder="Phone Number" title="Enter your 10-digit phone number" onchange="hide3()">

              <label for="birthday">Date of Birth</label>
              <!--span error messages for server side and client side validation-->
              <span class="error-server">* <?php echo $bdayErr;?></span>
              <span id="dateInvalid" class="error-message">Date is invalid</span>
              <input type="text" value="<?php echo $bday; ?>" id="birthday" name="datebirth" placeholder="Date of Birth (dd/mm/yy)" title="(dd/mm/yyyy) - Must be at least 18 years old" onchange="hide4()">

              <label for="password1">Password</label>
              <!--span error messages for server side and client side validation-->
              <span class="error-server">* <?php echo $passwordErr;?></span>
              <span id="passmissing" class="error-message">Password is invalid</span>
              <input type="password" id="password1" name="pass" placeholder="Password" title="Enter your password - minimum 6 characters, maximum 16 with no symbols or special characters except _ " onchange="hide5()">

              <label for="passConfirm">Confirm Password</label>
              <input type="password" id="passConfirm" name="confirm" placeholder="Confirm Password" title="Confirm your password" onchange="hide5()">

              <!-- Submission buttion, with value of register (so a validation buttion doesn't run for both login/register) -->
              <input type="submit" value="Register">
            </form>
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
