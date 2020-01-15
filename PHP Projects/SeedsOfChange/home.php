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
      
      <div class='row'>
        
      </div>


    </div>
    <?php addBootJs() ?>
    <script src='jsScripts/login.js'></script>
  </body>

  </html>
