<!DOCTYPE html>
<?php
include("createDatabase.php");
include("submissionCheck.php");
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/submission.css">
  <!-- Load an icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
  <title>Sample Results</title>
  <style>.error { color: red;}</style>
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- navbar-collapse allows the navbar to collapse when it reaches a certain minimal width -->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <!-- Contains the menu items of the navbar -->
        <div class="navbar-nav">
          <!-- Active makes the menu item always highlighted to add contrast with other buttons -->
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          <a class="nav-link" href="individual_sample.php">Results</a>
          <a class="nav-link" href="submission.php">Add Chew</a>
        </div>
        <!-- ml-auto moves the items to the right of the navbar -->
        <div class="navbar-nav  ml-auto">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
          <a class="nav-link" href="signup.html">Signup</a>
        </div>
      </div>
    </div>
  </nav>


  <!-- Adding contents within jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <!-- Form Class -->
    <form method = "post">
      <div class="form">
        <!-- Title of the Form-->
        <h1>Add Chews</h1>
        <div class="form-row col-md-10">
          <div class="form-group col-md-10">
            <!-- First input NAME Validation: Required Field -->
            <label for="inputName">Restaurant Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Name" name = 'name'>
            <?php echo $error_name; ?>
          </div>
        </div>

        <div class="form-row col-md-10">
          <div class="form-group col-md-10">
            <!-- Second input DESCRIPTION Validation: Required Field-->
            <label for="inputDesc">Description</label>
            <input type="text" class="form-control" id="inputDesc" placeholder="What's so special" name = 'desc'>
            <?php echo $error_description; ?>
          </div>
        </div>

        <div class="form-row col-md-10">
          <div class="form-group col-md-10">
            <!-- Third input LATITUDE Validation: Can fill out this field using button to get coordinates -->
            <label for="inputLat">Latitude Coordinates</label>
            Latitude: <input id="lat" name = "lat" type="text" name="Latitude" /> <br />
            <?php echo $error_latitude; ?>
          </div>
        </div>


        <div class="form-row col-md-10">
          <div class="form-group col-md-10">
            <!-- Third input LONGITUDE Validation: Can fill out this field using the button to get coordinates -->
            <label for="inputLong">Longitude Coordinates</label>
            Longitude: <input id="long" name = "lon" type="text" name="Longitude"/>
            <?php echo $error_longitude; ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <!-- Fourth input IMAGEs Validation: Check for jpeg, png or gif files-->
            <label for="fileToUpload">Upload Image(s) jpeg/png/gif</label>
            <input type="file" name="fileToUpload" id="fileToUpload" accept="image/png,image/gif,image/jpeg">
            <div id="upload"><input type="submit" value="Upload Image" name="submit"></div>
          </div>

        </div>
        <button type="submit" name = "Submit" class="btn btn-primary">Submit</button>
      </div>
      <!-- SUBMIT FORM BUTTON -->




    </form>
    <!--  The button used to get user's location in longitude and latitude and fills out the respective fields -->
    <button onclick="getLocation()" class = "getlocation">Get Location Coordinates</button>
    
    
    <!-- JAVASCRIPT Code for getting user's location for the autofill option of longitude and latitude -->
    <script>
    var x=document.getElementById("lat");
    var y=document.getElementById("long");
    function getLocation()
      {
      if (navigator.geolocation)
        {
        navigator.geolocation.getCurrentPosition(showPosition);
        }
      else{x.innerHTML="Geolocation is not supported by this browser.";}
      }
      // Autofills the form with longitude and latitude positiions
    function showPosition(position)
      {
      x.value=position.coords.latitude;  
      y.value=position.coords.longitude;    
      }
    </script>
    
    </body>
    </html>
   



  </div>




  <div class="myfooter">

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
              <p id="slogan">
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
                <a href="submission.php">Submit A Review</a>
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
          ?? 2021 Copyright:
          <a class="text-reset fw-bold" href="index.php">ChewReviews.ca</a>
        </div>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>





</body>

</html>