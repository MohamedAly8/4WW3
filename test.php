<?php 

//create databse
$servername = "chewreview.ca:3306";
$username = "chewreview";
$password = "password";

$conn = new mysqli($servername, $username, $password);

if ($conn -> connect_error ) {
    die("Connection failed " . $con->connect_error);
}
$sql = "CREATE DATABASE example1";
if ($conn->query($sql) === TRUE) {
    echo("Successfully");
}
else {
    echo("error");
}
$conn->close();


?> 