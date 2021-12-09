<?php
session_start();
$_SESSION['logged'] = False;
$error_email = "";
$error_pswd = "";
$test = True;
if(isset($_POST['Submit'])){

    $emp_email=trim($_POST["email"]);
    $emp_pass = trim($_POST["pwd"]);
  //$emp_number=trim($_POST["emp_number"]);
  //$emp_email=trim($_POST["emp_email"]);

  if($emp_email =="") {
    $error_email =  "<span class='error'>Please enter your email.</span>";
    $test = False;
    //$code= "1" ;
  }

  if($emp_pass =="") {
    $error_pswd =  "<span class='error'>Please enter password.</span>";
    $test = False;
    //$code= "1" ;
  }

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

$sql = "SELECT * from MyUsers";

if($result = mysqli_query($conn, $sql)){ 
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            if ($row['email'] == $emp_email) {
                if ($row['password1'] != $emp_pass) {
                    $_SESSION['logged'] = False;
                    echo '<p style = "color: red";>Incorrect Password</p>';
                }
                else {
                    $_SESSION['logged'] = True;
                    echo '<p style = "color: green";>Logged In User</p>';
                }
           
          
            }
                
                
            else {
                $_SESSION['logged'] = False;
                echo '<p style = "color: red";>No User Found. Please Sign Up</p>';
             
            }
          
        }
        
        
    }
}
       

$conn->close();

    }


}
else {
    echo "<br>";
}
  
  ?>
