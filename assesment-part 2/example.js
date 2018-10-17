function validateAddress(form) {
  var input = getElementById('address');
  var regex = /[A-z0-9]/;
  if(regex.test(input))
  {
    document.getElementById('address_err').style.visiblity = "visible";
    return false;
  }
  else {return true;}
}
