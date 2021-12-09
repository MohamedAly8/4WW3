<?php

session_start();
$loggedin = $_SESSION['logged'];
//check for post request
if(isset($_POST['Submit'])){


    //get the variable values
    $rest_rating=trim($_POST["ratings"]);
    $rest_review = trim($_POST["review"]);
    $rest_lat = trim($_POST["lat"]);
    $rest_lon= trim($_POST["lon"]);
    $name = trim($_POST["name"]);

//add reviews to database

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($loggedin) {
    //insert into table
    $sql = "INSERT INTO MyReviews (name, latitude, longitude, review, rating)
    VALUES ('$name', '$rest_lat', '$rest_lon', '$rest_review', '$rest_rating')";
    
    //check if record entered successfully
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    else {
        echo '<p style = "color: red";>User not Logged In. No Data created.</p>';
    }
    
    $conn->close();
}

//display them on the page dynamically


$lat_val = $_SESSION['latval']; //need to match this value
$lon_val = $_SESSION['lonval'];

//now we need to access DATABASE
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM MyReviews WHERE latitude = '$lat_val' and longitude = '$lon_val'";
if($result = mysqli_query($conn, $sql)){ 
    if(mysqli_num_rows($result) > 0){
        echo '<table class = "table table-striped">';
            echo "<tr>";
                echo "<th>Rating</th>";
                echo "<th>Review</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['rating'] . "</td>";
                echo "<td>" . $row['review'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
       
    }
    else {
       // echo "No results found";
    }
}


else {
   // echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}



//we need to display the ones that are for the sent longitude and latitude values


?>