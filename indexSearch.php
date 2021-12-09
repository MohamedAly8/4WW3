<?php
session_start();
$error_email = "";
$error_pswd = "";
$error_pswd2 = "";
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$test = True;
$rest_name = "DEFAULT";
$rating = '0';
if(isset($_GET['Submit'])){
    $rest_name=trim($_GET["name"]);
    $rating=($_GET["rev"]);
    $_SESSION['rating'] = $rating;
    $_SESSION['nameValue'] = $rest_name;
    
    header("Location:results_sample.php");
    

}

?>