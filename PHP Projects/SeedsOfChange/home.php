<?php

include './phpScripts/template.php';
include './phpScripts/functions.php';

?>

  <!doctype html>
  <html>

  <head>
    <?php addBoot() ?>
    <title>Seeds of Change</title>

    <link rel='stylesheet' type='text/css' href='./styles/styles.css'>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  </head>

  <body>

    <div class='container'>
      <!------------Nav Bar------------>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
        <div class="container">
          <a class="navbar-brand" id='navbar-brand' href="#">SEEDS OF CHANGE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-custom-color" href="signUp.php">SignUp</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <div class="jumbotron jumbotron-fluid" id='jumbotron_home'>
        <div class="container" id='login-jumbo'>
          <h1 class="display-4">Seeds of Change</h1>
          <p class="lead">Making a difference in the present that will impact the future</p>
        </div>
      </div>

      <div class="container">
        <div class='row'>
          <div class='col-md-6 col-sm-12'>
            <img src="images/hands_planting.jpg" id='helping_hands' alt="planting">
          </div>
          <div class='col-md-6 col-sm-12' id='description'>
            <h2>
              Saving endangered plants is ensuring a better future.
            </h2>
            <p>
              Seeds of change is a non-profit citizen led effort to ensure that endangered plants can survive. Inspite of our efforts--we can always do better--we have already lost some and will continue to lose plants to extinction. Regarding extinction, plants that
              are a part of this program will have the opportunity to come back to life. By harvesting a responsible amount of seeds from endangered plants, we can replant them in areas protected from people and invasive species. There are many areas
              of man-made climate change that must be addressed, but it will be many people taking many small steps that can lead to numerous big changes. Will you parter with us?
            </p>
          </div>

        </div>

      </div>

    </div>
    <?=addFooter()?>
      <?php addBootJs() ?>
      <script src='jsScripts/login.js'></script>
  </body>

  </html>
