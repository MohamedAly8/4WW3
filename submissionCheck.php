<?php
//declare the errors to be empty at the start
$error_name = "";
$error_description = "";
$error_latitude = "";
$error_longitude = "";
//to check if validation is ok
$test = True;

//check for post request
if(isset($_POST['Submit'])){


    //get the variable values
    $rest_name=trim($_POST["name"]);
    $rest_desc = trim($_POST["desc"]);
    $rest_lat = trim($_POST["lat"]);
    $rest_lon= trim($_POST["lon"]);


 //error for restaurant name being empty
  if($rest_name =="") {
    $error_name =  "<span class='error'>Please enter your restaurant name.</span>";
    $test = False;

  }

  
//error for description being empty
  if($rest_desc =="") {
    $error_description =  "<span class='error'>Please enter restaurant description.</span>";
    $test = False;

  }

//error for latitude being empty
  if($rest_lat =="") {
    $error_latitude =  "<span class='error'>Please enter latitude.</span>";
    $test = False;

  }
  
//check if latitude has the correct form
  if (!preg_match('/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/', $rest_lat)) {
    $error_latitude =  "<span class='error'>Invalid Latitude Coordinates.</span>";
    $test = False;
  }

  //error for longitude being empty
  if($rest_lon =="") {
    $error_longitude =  "<span class='error'>Please enter longitude.</span>";
    $test = False;
    //$code= "1" ;
  }

  //check if longitude has the correct form
  if (!preg_match('/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/', $rest_lon)) {
    $error_longitude =  "<span class='error'>Invalid Longitude Coordinates.</span>";
    $test = False;
  }

  //if all validation was okay --> add record to table in database
if ($test) {
  
        //now we add to the database 
        $servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//insert into table
$sql = "INSERT INTO MyObjects (name, description, latitude, longitude)
VALUES ('$rest_name', '$rest_desc', '$rest_lat', '$rest_lon')";

//check if record entered successfully
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
}
//submit was not a post request
else {
    echo "Not a Post Request<br>";
}

  
  ?>