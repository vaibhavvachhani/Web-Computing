/*
##Deprecated function##
function openTab(evt, divName){
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
*/

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
      msg = "User denied the request for Geolocation.";
      break;
    case error.POSITION_UNAVAILABLE:
      msg = "Location information is unavailable.";
      break;
    case error.TIMEOUT:
      msg = "The request to get user location timed out.";
      break;
    case error.UNKNOWN_ERROR:
      msg = "An unknown error occurred.";
      break;
  }
  document.getElementById("status").innerHTML = msg;
}

//Checks the username, email, phone, date and password entered. If any return false,
//function returns false, else returns true.
function validate(usernames) {
  checkUserName();
  checkEmail();
  checkPhone();
  checkBirthday();
  checkPassword();

  //if the user inputs valid data, it connects to the database, else returns false
  if (checkUserName() === false || checkEmail() === false || checkPhone() === false || checkBirthday() === false || checkPassword() === false) {
    return false;
  } else {
    document.forms['register'].submit();
    document.forms['register'].action = 'data.php';
    return true;
  }
}

function review_submit() {
  checkreview();
  checkRating();
  if (checkreview() === false || checkRating === false) {
    return false;
  } else {
    window.alert("Your review has been submitted");
  }
}

// review validation function
function checkreview() {
  var cc = document.getElementById("review").value;
  var regp = /^[a-zA-Z0-9\. ]*$/;
  if (cc.length < 3 || cc.length > 240 || !(regp.test(cc))) {
    document.getElementById("reviewMissing").style.visibility = "visible";
    return false;
  } else {
    document.forms['review_form'].submit();
    document.forms['review_form'].action = 'submitReview.php';
  }
}

function checkRating() {
  var cc = document.getElementById("rating").value;
  var regp = /^[1-5]*$/;
  if (cc.length < 1 || cc.length > 1 || !(regp.test(cc))) {
    document.getElementById("ratingMissing").style.visibility = "visible";
    return false;
  } else {
    return true;
  }
}
//As above, but for the login box. Seperate scripts as the validated items, abundand
//outputs are different/
function validateLogin() {
  checkUserNameLogin();
  checkPasswordLogin();
    //if the user inputs valid data, it connects to the database, else returns false
  if (checkUserNameLogin() === false || checkPasswordLogin() === false) {
    window.alert("Login Denied. Incorrect details.");
    return false;
  } else {
    document.forms['login_user'].action = 'login_user.php';
    document.forms['login_user'].submit();
    return true;
  }
}

//Check that the username uses characters A-Z, a-z, 0-9, or _ via regex.
//Check the length is more than five, and less than seventeen.
function checkUserNameLogin() {
  var cc = document.getElementById("username_login").value;
  var regp = /^[a-zA-Z0-9_]*$/;
  if ((cc.length < 6 || cc.length > 16) || !(regp.test(cc))) {
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
  if ((x < 6 || x > 16) || !(regp.test(x))) {
    document.getElementById("passmissingLogin").style.visibility = "visible";
  } else {
    return true;
  }
}
// hide error message, on changes
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

// hide error message, on changes
function hide1() {
  document.getElementById("usernameMissing").style.visibility = "hidden";
}

function checkEmail() {
  var x = document.getElementById("email").value;
  //Uses https://www.regular-expressions.info/email.html, slightly modified for our purposes
  var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i;
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

// hide error message, on changes
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

// hide error message, on changes
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

// hide error message, on changes
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

// hide error message, on changes
function hide5() {
  document.getElementById("passmissing").style.visibility = "hidden";
}

function validateSearch() {
  checkNetworkName();
  checkLocationName();
  checkSuburb();
  checkRating();

  if (checkNetworkName() === false || checkLocationName() === false || checkSuburb() === false || checkRating() === false) {
    return false;
  } else {
    //change to searching function
    document.forms['search'].action = 'searchQuery.php';
    document.forms['search'].submit();
    return true;
  }
}

function checkNetworkName() {
  var x = document.getElementById("netName").value;
  //check that password1, is same as passConfirm (x, y respectively)
  var regp = /^[a-zA-Z0-9_\.\(\)\-\, ]*$/;
  if (!(regp.test(x))) {
    document.getElementById("networkMissing").style.visibility = "visible";
    return false;
  }
}

function checkLocationName() {
  var x = document.getElementById("locname").value;
  //check that password1, is same as passConfirm (x, y respectively)
  var regp = /^[a-zA-Z0-9_\.\(\)\-\,\& ]*$/;
  if (!(regp.test(x)) && !(x === "") || !(regp.test(x))) {
    document.getElementById("locationMissing").style.visibility = "visible";
    return false;
  }
  if ((regp.test(x)) && !(x === "")) {
    document.getElementById("locname").value = geoLoc_showCoordinates(document.getElementById("locname").value);
  }
}

function checkSuburb() {
  var x = document.getElementById("suburb").value;
  //check that password1, is same as passConfirm (x, y respectively)
  var regp = /^[0-9]*$/;
  if (!(regp.test(x))) {
    document.getElementById("suburbMissing").style.visibility = "visible";
    return false;
  }
}

function checkRating() {
  var x = document.getElementById("rating").value;
  //check that password1, is same as passConfirm (x, y respectively)
  var regp = /^[0-5]$/;
  if (!(regp.test(x))) {
    document.getElementById("ratingMissing").style.visibility = "visible";
    return false;;
  }
}

// hide error message, on changes
function hideErr(idName) {
  document.getElementById(idName).style.visibility = "hidden";
}

// When the user clicks the button, open the modal
function openPopup() {
  var modal = document.getElementById('popup');
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closePopup() {
  var modal = document.getElementById('popup');
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  var modal = document.getElementById('popup');
  if (event.target === modal) {
    modal.style.display = "none";
  }
}

function overallMapCreate(latilist) {
  originLatLong = {
    lat: -27.4698,
    lng: 153.0251
  };

  var overallMap = new google.maps.Map(document.getElementById("overallMap"), {
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: new google.maps.LatLng(originLatLong),
  });

  var infowindow = new google.maps.InfoWindow();
  var marker, i;
  var bounds = new google.maps.LatLngBounds();

  for (i = 0; i < latilist.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(latilist[i][5], latilist[i][6]),
      map: overallMap
    });

    var boundLoc = new google.maps.LatLng(latilist[i][5], latilist[i][6]);
    bounds.extend(boundLoc);

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        var contentString =
          '<div class="overallMapFont"><b><p>' + latilist[i][0] + '</b></p>' +
          '<p>' + latilist[i][1] + ', ' + latilist[i][2] + '</p>' +
          '<p>Rating:  ' + latilist[i][3] + '</p>' +
          '<a href="' + latilist[i][4] + '" class="overallMapFont"><input type="submit" value="View"></a></div>';
        infowindow.setContent(contentString);
        infowindow.open(overallMap, marker);
      }
    })(marker, i));
  }

  overallMap.fitBounds(bounds);
}

function initMapSearch(lati, longi, itemID) {
  var myLatLng = {
    lat: lati,
    lng: longi
  };

  var map = new google.maps.Map(document.getElementById(itemID), {
    zoom: 13,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Network Map'
  });
}


//Position variable is the user's address
function geoLoc_showCoordinates(userAddress) {
  //Url is the google maps JSON API result for the details, at the latitude and longitude the user is at.
  var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + userAddress;
  //parse the JSON into a variable, via the getJSON function, which requests, and receives it
  var googleMapsApiJSON = JSON.parse(getJSON(url));
  //Within the google maps API, the formatted_address, is the approximate address of the user.
  var userLat = googleMapsApiJSON.results[0].geometry.location.lat;
  var userLong = googleMapsApiJSON.results[0].geometry.location.lng;

  return [userLat, userLong];
}

function geoLoc_showPosition(userAddress, targetLatitude, targetLongitude) {
  var userLocation = geoLoc_showCoordinates(userAddress);
  if (typeof(Number.prototype.toRadians) === "undefined") {
    Number.prototype.toRadians = function() {
      return this * Math.PI / 180;
    }
  }

  var R = 6371e3; // metres
  var a1 = userLocation[0].toRadians();
  var a2 = targetLatitude.toRadians();
  var chA = (targetLatitude - userLocation[0]).toRadians();
  var chL = (targetLongitude - userLocation[1]).toRadians();

  var a = Math.sin(chA / 2) * Math.sin(chA / 2) +
    Math.cos(a1) * Math.cos(a2) *
    Math.sin(chL / 2) * Math.sin(chL / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

  var d = R * c;
  return (d);
}
