function verifyEmail() {
    var x = document.myform.email.value

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(x)) {
      document.getElementById("messsageEmail").innerHTML = "";
      return (true);
    }
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

    //minimum length validation 
    if (pw.length < 8) {
      document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";
      return false;
    }
    else {
      document.getElementById("message").innerHTML = "";
    }

    //maximum length validation  
    if (pw.length > 15) {
      document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";
      return false;
    }
    else {
      document.getElementById("message").innerHTML = "";
        }
    //equality of passwords validation
    if (pw != pw2) {
      document.getElementById("messageMismatch").innerHTML = "Passwords did not match";
      return false;
    } else {
      document.getElementById("messageMismatch").innerHTML = "";
      return true;
    }


  }