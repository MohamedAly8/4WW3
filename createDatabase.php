<?php 

//create databse
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn -> connect_error ) {
    die("Connection failed " . $con->connect_error);
}



$sql = "CREATE DATABASE users";
if ($conn->query($sql) === TRUE) {
    echo("Successfully");
}
else {
    echo("error");
}

$conn->close();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
  die("Connection failed: " . $conne->connect_error);
}

// sql to create table
$sql = "CREATE TABLE MyUsers (
    email VARCHAR(50) PRIMARY KEY,
    password1 VARCHAR(30) NOT NULL
    )";

if ($conne->query($sql) === TRUE) {
    echo "Table myUsers created successfully";
  } else {
    echo "Error creating table: " . $conne->error;
  }



$conne->close();


?> 