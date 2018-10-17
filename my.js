function openTab(evt, divName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(divName).style.display = "block";
  evt.currentTarget.className += " active";
}

//Send a http request (for the Google maps API), and retrieve the provided JSON
function getJSON(url) {
  var Httpreq = new XMLHttpRequest();
  Httpreq.open("GET", url, false);
  Httpreq.send(null);
  return Httpreq.responseText;
}

//Retrieve the user's geolocation (lat/long)
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else {
    document.getElementById("status").innerHTML = "Geolocation is not supported by this browser.";
  }
}

//Position variable is the user's lat/long
function showPosition(position) {
  //Url is the google maps JSON API result for the details, at the latitude and longitude the user is at.
  var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," + position.coords.longitude + "&sensor=true";
  //parse the JSON into a variable, via the getJSON function, which requests, and receives it
  var googleMapsApiJSON = JSON.parse(getJSON(url));
  //Within the google maps API, the formatted_address, is the approximate address of the user.
  var address = googleMapsApiJSON.results[0].formatted_address;
  //Fill in the locname textbox with the retrieved address. Generally gets the suburb correct.
  document.getElementById("locname").value = address;
}

//If there are any errors in the geolocation functions, these messages are shown.
//Output is for debugging purposes. There's no status element on the page.
function showError(error) {
  var msg = "";
  switch (error.code) {
    case error.PERMISSION_DENIED:
      msg = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      msg = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      msg = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      msg = "An unknown error occurred."
      break;
  }
  document.getElementById("status").innerHTML = msg;
}

//Checks the username, email, phone, date and password entered. If any return false,
//function returns false, else returns true.
function validate() {
  checkUserName();
  checkEmail();
  checkPhone();
  checkBirthday();
  checkPassword();
  if (checkUserName() == false || checkEmail() == false || checkPhone() == false || checkBirthday() == false || checkPassword() == false) {
    return false;
    window.alert("Registration failed, invalid inputs.");
  }
  return true;
}

//As above, but for the login box. Seperate scripts as the validated items, abundand
//outputs are different/
function validateLogin() {
  checkUserNameLogin();
  checkPasswordLogin();
  if (checkUserNameLogin() == false || checkPasswordLogin() == false) {
    return false;
    window.alert("Login Denied. Incorrect details.");
  }
  return true;
}

//Check that the username uses characters A-Z, a-z, 0-9, or _ via regex.
//Check the length is more than five, and less than seventeen.
function checkUserNameLogin() {
  var cc = document.getElementById("username_login").value;
  var regp = /^[a-zA-Z0-9_]*$/;
  if (cc.length < 6 || cc.length > 16 || !(regp.test(cc))) {
    document.getElementById("usernameMissingLogin").style.visibility = "visible";
    return false;
  } else {
    return true;
  }
}

//Hide error element, on changes
function hideL() {
  document.getElementById("usernameMissingLogin").style.visibility = "hidden";
}

//Until specified, all scripts are similar to the username check, but for their respective inputs
function checkPasswordLogin() {
  var x = document.getElementById("passwordLogin").value;
  var regp = /^[a-zA-Z0-9_]*$/;
  if (x < 6 || x > 16 || !(regp.test(x)))
  {
    document.getElementById("passmissingLogin").style.visibility = "visible";
  }
}

function hideP() {
  document.getElementById("passmissingLogin").style.visibility = "hidden";
}

function checkUserName() {
  var cc = document.getElementById("username1").value;
  var regp = /^[a-zA-Z0-9_]*$/;
  if (cc.length < 6 || cc.length > 16 || !(regp.test(cc))) {
    document.getElementById("usernameMissing").style.visibility = "visible";
    return false;
  } else {
    return true;
  }
}

function hide1() {
  document.getElementById("usernameMissing").style.visibility = "hidden";
}

function checkEmail() {
  var x = document.getElementById("email").value;
  //regex a-z,0-9,_ and connect.qut.edu.ay email address. Will be less specific in the future.
  var regex = /^[a-z0-9_]+@connect.qut.edu.au$/;
  if (x.length < 6 || x.length > 30) {
    document.getElementById("emailInvalid").style.visibility = "visible";
    return false;
  } else if (!(regex.test(x))) {
    document.getElementById("emailInvalid").style.visibility = "visible";
    return false;

  } else {
    return true;
  }
}

function hide2() {
  document.getElementById("emailInvalid").style.visibility = "hidden";
}

function checkPhone() {
  var x = document.getElementById("phoneno").value;
  //length, and #'s via regex
  var regex = /^\d{10}$/;

  if (!(regex.test(x))) {
    document.getElementById("phoneInvalid").style.visibility = "visible";
    return false;

  } else {
    return true;
  }

}

function hide3() {
  document.getElementById("phoneInvalid").style.visibility = "hidden";

}

function checkBirthday() {
  var x = document.getElementById("birthday").value;
  //Longer regex for 0-9, with limits on date as per dd/mm/yy
  var regex = /^(0[1-9]|[12][0-9]|3[01])[-/](0[1-9]|1[012])[-/](18|19)\d\d$/;
  if (!(regex.test(x))) {
    document.getElementById("dateInvalid").style.visibility = "visible";
    return false;

  } else {
    return true;
  }
}

function hide4() {
  document.getElementById("dateInvalid").style.visibility = "hidden";
}

function checkPassword() {

  var x = document.getElementById("password1").value;
  var y = document.getElementById("passConfirm").value;
  //check that password1, is same as passConfirm (x, y respectively)
  var regp = /^[a-zA-Z0-9_]*$/;
  if (x < 6 || y < 6 || x > 16 || y > 16 || !(regp.test(x)) || !(regp.test(y))) {
    document.getElementById("passmissing").style.visibility = "visible";
}

  if (y != x) {
    window.alert("Passwords do not match!");
    return false;
  }
}

function hide5() {
  document.getElementById("passmissing").style.visibility = "hidden";
}
