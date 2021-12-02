<?php
session_start();
$error_email = "";
$error_pswd = "";
$error_pswd2 = "";
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$test = True;
$rest_name = "DEFAULT";
if(isset($_GET['Submit'])){
    $rest_name=trim($_GET["name"]);
    $_SESSION['nameValue'] = $rest_name;
    header("Location:results_sample.php");
    

}

?>