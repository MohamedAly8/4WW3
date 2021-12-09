<?php 
//include ('indexSearch.php');
session_start();
$var_value = $_SESSION['nameValue'];
$rate = $_SESSION['rating'];
$_SESSION['markers']=array();

//now we need to access DATABASE
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

//get all the values of object results where name matches or rating is greater than or equal to

$sql = "SELECT * FROM MyObjects WHERE MyObjects.name = '$var_value'";
if($result = mysqli_query($conn, $sql)){ 
    if(mysqli_num_rows($result) > 0){
        echo '<table class = "table table-striped">';
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Description</th>";
                echo "<th>Longitude</th>";
                echo "<th>Latitude</th>";

     
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo '<td><a href="individual_sample.php">' . $row['name'] . '</a></td>';
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['latitude'] . "</td>";
                $_SESSION['latval'] =  $row['latitude'];
                echo "<td>" . $row['longitude'] . "</td>";
                
                $_SESSION['lonval'] =  $row['longitude'];
              

                array_push($_SESSION['markers'],$row['latitude'],$row['longitude']); 
                
                
                
            echo "</tr>";
        }
        echo "</table>";

        
        // Free result set
        mysqli_free_result($result);
       
    }
    else {
        echo "No results found";
    }
}


else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

$conn->close();

//$result = mysql_query($sql);  

//$data = mysql_fetch_assoc($result);

//echo "Hello, your lastname is $sql";

?>