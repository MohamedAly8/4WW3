function verifyEmail() {
  // Get the email value from the form
    var x = document.myform.email.value
// This is to validate that email type is correct ie. contains @, does not start with a '.', etc.
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(x)) {
      document.getElementById("messsageEmail").innerHTML = "";
      return (true);
    }
    //If email type is incorrect display error message
    else {
      document.getElementById("messsageEmail").innerHTML = "You have entered an invalid email address!";
      return (false)
    }
  }


  function verifyPassword() {
    //get the passwords from the fields 
    var pw = document.getElementById("pswd").value;
    var pw2 = document.getElementById("pswd2").value;
    //can't have empty password 
    if (pw == "") {
      document.getElementById("message").innerHTML = "**Fill the password please!";
      return false;
    }

    //minimum length validation, display error message if less than 8 characters
    if (pw.length < 8) {
      document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";
      return false;
    }
    //if less not less than 8 characters, no error message
    else {
      document.getElementById("message").innerHTML = "";
    }

    //maximum length validation, display error message if greater than 15 characters
    if (pw.length > 15) {
      document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";
      return false;
    }
    //if not greater than 15 characters, no error message
    else {
      document.getElementById("message").innerHTML = "";
        }
    //equality of passwords validation, if not equal then display error message
    if (pw != pw2) {
      document.getElementById("messageMismatch").innerHTML = "Passwords did not match";
      return false;
    } else {
      //at this point, password is fully validated so return true with no error message
      document.getElementById("messageMismatch").innerHTML = "";
      return true;
    }


  }