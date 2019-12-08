<?php
session_start();

include './phpScripts/template.php';
include './phpScripts/Data.php';
include './phpScripts/user.class.php';

$user = new User(8); // hard coded for testing


?>

  <!doctype html>
  <html>

  <head>
    <?php addBoot() ?>
    <title>Profile</title>

    <link rel='stylesheet' type='text/css' href='./styles/login.css'>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  </head>

  <body>

    <div class='container'>
      <!------------Nav Bar------------>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
        <div class="container">
          <a class="navbar-brand" id='navbar-brand'>SEEDS OF CHANGE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="tracking.php">Tracking<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-custom-color active" href="#">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-custom-color" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!--Jumbotron-->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Hello,
            <?= $user->get_first_name(); ?>
          </h1>
          <p class="lead">You can review and make changes to your profile.</p>
        </div>
      </div>

      <div class='row'>
        <div class='col-sm-12 col-md-6'>
          <!--Form for changing password-->
          <form>
            <fieldset>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name='password' id="password" aria-describedby="password">
              </div>
              <div class="form-group">
                <label for="repass">Confirm:</label>
                <input type="repass" class="form-control" name='repass' id="repass">
              </div>
              <button type="submit" class="btn btn-primary">Update Password</button>
            </fieldset>
          </form>
        </div>
        <div class='col-sm-12 col-md-6'>
          <form>
            <fieldset>
              <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name='first_name' id="first_name" aria-describedby="first_name">
              </div>
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name='last_name' id="last_name">
              </div>
               <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name='email' id="email">
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </fieldset>
          </form>
        </div>
      </div>

    </div>

    <?php addBootJs() ?>
    <script src='jsScripts/script.js'></script>
  </body>

  </html>
