<?php
session_start();

include './phpScripts/template.php';
include './phpScripts/Data.php';
include './phpScripts/user.class.php';

$user = new User(8); // hard coded for testing

//connect to database
$con = new Data();
$con = $con->connect();

//set flags
$updatedPassword = false;
$updatedInfo = false;


//update the password
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  if(!empty($_POST['password'])){
    //get input and satnitize it
    $password = mysqli_real_escape_string($con, strip_tags($_POST['password']));
    //create query
    $update = <<< EOT
    update user set password = '$password' where user_id = {$user->get_user_id()}
EOT;
    //update the password
    mysqli_query($con, $update);
   //set flag to true
   $updatedPassword = true;    
  }elseif(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])){
    $first_name = mysqli_real_escape_string($con, strip_tags($_POST['first_name']));
    $last_name = mysqli_real_escape_string($con, strip_tags($_POST['last_name']));
    $email = mysqli_real_escape_string($con, strip_tags($_POST['email']));
    
    //create udpate statement
    $update = <<< EOT
    update user set first_name = '$first_name', last_name = '$last_name', email = '$email' where user_id = '{$user->get_user_id()}'
EOT;
    
    //update the information
    mysqli_query($con, $update);
    
  }

}

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
          <form action='profile.php' method='post'>
            <fieldset>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name='password' id="password" aria-describedby="password">
              </div>
              <div class="form-group">
                <label for="repass">Confirm:</label>
                <input type="password" class="form-control" name='repass' id="repass">
              </div>
              <button type="submit" class="btn btn-primary">Update Password</button>
            </fieldset>
          </form>
        </div>
        <div class='col-sm-12 col-md-6'>
          <form action='profile.php' method='post'>
            <fieldset>
              <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name='first_name' id="first_name" aria-describedby="first_name" value='<?= $user->get_first_name()?>' required/>
              </div>
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name='last_name' id="last_name" value='<?= $user->get_last_name()?>' required/>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name='email' id="email" value='<?= $user->get_email()?>' required/>
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
