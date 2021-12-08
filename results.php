<?php 
//include ('indexSearch.php');
session_start();
$var_value = $_SESSION['nameValue'];
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

$sql = "SELECT * FROM MyObjects WHERE name = '$var_value'";
$x = 0;
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
                
                
                echo 
                        

                                '<div id  = "map_'.$x.'" align = "right; width = 100%">
                                    <script>    <!--Google map api-->
                                      function initMap() {
                                        var x = '. $row['latitude']. ';
                                        var y = '. $row['longitude']. ';
                                        var myLatLng = {lat: x, lng: y};

                                        var map = new google.maps.Map(document.getElementById("map_'.$x.'"), {
                                          center: myLatLng,
                                          scrollwheel: true,
                                          zoom: 4
                                        });

                                        var marker = new google.maps.Marker({
                                          map: map,
                                          position: myLatLng,
                                          title: \'Hello World!\'
                                        });
                                      }
                                    </script>
                                    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
                                </div>'; 
                        
                           $x++;
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