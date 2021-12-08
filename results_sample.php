<!DOCTYPE html>
<?php
include('createDatabase.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <link rel="stylesheet" href="resources/css/results_sample.css">
         <!-- Load an icon library -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
         <script src="/resources/js/results_sample.js"></script>

         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>



    <title>Sample Results</title>
</head>

<body>

<!-- Bootstrap navbar, added style to change color -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: lightgreen;">
  <!-- This class makes container span full width of viewport -->
    <div class="container-fluid">
      <!-- Navbar-brand is the "website name" which is on the left side of the navbar, added style to customize vanilla brand -->
      <a class="navbar-brand" href="index.php">ChewReviews<i style="margin-right: 2px;" class="fa fa-cutlery"
        aria-hidden="true"></i></a>
        <!-- Button for when the navbar is collapsible when at a certain screen width -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- navbar-collapse allows the navbar to collapse when it reaches a certain minimal width -->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <!-- Contains the menu items of the navbar -->
        <div class="navbar-nav">
          <!-- Active makes the menu item always highlighted to add contrast with other buttons -->
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          <a class="nav-link" href="individual_sample.php">Results</a>
          <a class="nav-link" href="submission.php">Submit a Review</a>
        </div>
        <!-- ml-auto moves the items to the right of the navbar -->
        <div class="navbar-nav  ml-auto">
            <a class="nav-link active" aria-current="page" href="login.html">Login</a>
            <a class="nav-link" href="signup.php">Signup</a>
          </div>
      </div>
    </div>
  </nav>

            
            
  <!-- Adding contents within jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <!-- Title of the result -->

    <h1>Your Possible Chews</h1>
    <?php
include('results.php');
?>

<div id="map">
    <script>
    var sample_map = L.map('map').setView([43.58318179804465, -79.63780996170709], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibW9oYW1lZGFseWFseSIsImEiOiJja3d5MWdhM3MwOWdtMnBvNjNhNnZmZWtmIn0.CQlyUonY5mAZzdrEPAKNAA'
}).addTo(sample_map);

var marker = L.marker([43.58318179804465, -79.63780996170709]).addTo(sample_map);

marker.bindPopup("<b>Ozzy Burger</b><br>Great Burgers");




  </script>      
  
  </div>

  </div>
    

  <!-- The Map Result-->
  <!-- <img src = "/resources/mapsearch.png" alt = "Location on a Map"> --> 



  <!-- <div class="myfooter">
    <!-- Currently working on this -->
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
  
  
      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start p-4 border-bottom">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                  <i class="fa fa-cutlery"></i>
              </h6>
              <p id = "slogan">
                Connecting You To Food      
              </p>
            </div>
            <!-- Grid column -->
  
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Resources
              </h6>
              <p>
                <a href="signup.php">Signup</a>
              </p>
              <p>
                <a href="index.php">Search</a>
              </p>
              <p>
                <a href="submission.php" >Submit A Review</a>
              </p>
            </div>
            <!-- Grid column -->
  
  
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Contact
              </h6>
              <p><i class="fa fa-home me-3"></i> Oakville, ON L6M5B4, CA</p>
              <p>
                <i class="fa fa-envelope me-3"></i>
                chewreviews@gmail.com
              </p>
              <p><i class="fa fa-phone me-3"></i> + 01 647 555 44</p>
              <p><i class="fa fa-print me-3"></i> + 01 647 333 22</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->
  
      <!-- Copyright -->
      <div id="footer-content">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2021 Copyright:
          <a class="text-reset fw-bold" href="index.php">ChewReviews.ca</a>
        </div>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div> -->
      
</body>
</html>