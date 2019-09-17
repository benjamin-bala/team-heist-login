function validate() {

  //regex
  var name = /^[A-Za-z]+$/;
  var letters = /^[A-Za-z]+$/;
  var numbers = /^[0-9]+$/;
  var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\. \w{2,3})+$/;
  if (document.form.fullname.value == "" || !document.form.username.value.match(name)) {
    alert("Please provide your fullname! and make sure it is up to four");
    document.form.fullname.focus();
    return false;
  }

  else if (document.form.email.value == "") {
    alert("Please provide your Email!");
    document.form.email.focus();
    return false;
  }
  else if (document.form.username.value == "" || !document.form.username.value.match(letters)) {
    alert("Please provide your username!");
    document.form.email.focus();
    return false;
  }

  else if (document.form.phone.value == "" || document.form.phone.match(numbers)) {
    alert("Please provide your Phone number!");
    document.form.phone.focus();
    return false;
  }
  else if (document.form.password.value == "" || document.password - form.password.value < 4) {
    alert("Please provide your password!");
    document.form.password.focus();
    return false;
  }
  else if (document.form.Cpassword.value == "" ) {
    return alert("Please provide your Confirmed password!");
    document.form.Cpassword.focus();
    return false;
  } else if (document.form.password.value !== document.form.Cpassword.value) {
    alert("Confirm you password please!");
    document.form.Cpassword.focus();
    return false;
  } else {
    return true
  }
}