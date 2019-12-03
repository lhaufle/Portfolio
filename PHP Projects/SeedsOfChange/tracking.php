<?php
//start session with user_id from login
session_start();
echo $_SESSION['user_id'];

include './phpScripts/template.php';
include './phpScripts/Data.php';
include './phpScripts/user.class.php';

?>

  <!doctype html>
  <html>
  <head>
    <?php addBoot() ?>
    <title>Login</title>

    <link rel='stylesheet' type='text/css' href='./styles/login.css'>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  </head>

  <body>
    
    <div class='container'>
      <!------------Nav Bar------------>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
        <div class="container">
          <a class="navbar-brand" id='navbar-brand' href="home.php">SEEDS OF CHANGE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="tracking.php">Tracking<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-custom-color" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
    </div>
    
   <?php addBootJs() ?>
    <script src='jsScripts/script.js'></script>
  </body>

  </html>
