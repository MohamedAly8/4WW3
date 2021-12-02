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
    echo("Successfully created database <br>");
}
else {
    echo("Error creating database <br>");
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

// sql to create table #1 FOR USERS
$sql = "CREATE TABLE MyUsers (
    email VARCHAR(50) PRIMARY KEY,
    password1 VARCHAR(30) NOT NULL
    )";

if ($conne->query($sql) === TRUE) {
  echo "MyUsers created successfully";
} else {
  echo "Error creating table: " . $conne->error;
}



$conne->close();

// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
  die("Connection failed: " . $conne->connect_error);
}

//sql to create table #2 FOR OBJECTS
$sql = "CREATE TABLE MyObjects (
  name VARCHAR(50) NOT NULL,
  description VARCHAR(1000) NOT NULL,
  latitude VARCHAR(50) NOT NULL,
  longitude VARCHAR(50) NOT NULL,
  PRIMARY KEY (latitude, longitude)
  )";

if ($conne->query($sql) === TRUE) {
  echo "MyObjects created successfully";
} else {
  echo "Error creating table: " . $conne->error;
}



$conne->close();

// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
  die("Connection failed: " . $conne->connect_error);
}

 //sql to create table #3 FOR REVIEWS
 $sql = "CREATE TABLE MyReviews (
  name VARCHAR(50) NOT NULL,
  review VARCHAR(50) NOT NULL,
  rating INT NOT NULL,
  PRIMARY KEY (name, review, rating)
  )";

if ($conne->query($sql) === TRUE) {
  echo "MyObjects created successfully";
} else {
  echo "Error creating table: " . $conne->error;
}



$conne->close();


// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
  die("Connection failed: " . $conne->connect_error);
}

 //sql to create prefilled values for object
 $sql = "INSERT INTO MyObjects (name, description, latitude, longitude)
  VALUES ('Ozzy', 'Burger Place', '43.4443842', '-79.7607413')";

if ($conne->query($sql) === TRUE) {
  echo "Value created successfully";
} else {
  echo "Error creating table: " . $conne->error;
}



$conne->close();

// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
  die("Connection failed: " . $conne->connect_error);
}

 //sql to create prefilled values for object
 $sql = "INSERT INTO MyObjects (name, description, latitude, longitude)
  VALUES ('Burger Factory', 'mediocre', '45.4443842', '-79.7607413')";

if ($conne->query($sql) === TRUE) {
  echo "Value created successfully";
} else {
  echo "Error creating table: " . $conne->error;
}



$conne->close();


// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
  die("Connection failed: " . $conne->connect_error);
}

 //sql to create prefilled values for object
 $sql = "INSERT INTO MyObjects (name, description, latitude, longitude)
 VALUES ('Gladiator', 'Horrible burgers', '47.4443842', '-79.7607413')";

if ($conne->query($sql) === TRUE) {
  echo "Value created successfully";
} else {
  echo "Error creating table: " . $conne->error;
}



$conne->close();


?> 