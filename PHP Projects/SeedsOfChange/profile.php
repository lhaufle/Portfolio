<?php
//not complete still pending more validation and style


session_start();
//$id = $_SESSION['user_id'];

include './phpScripts/template.php';
include './phpScripts/Data.php';
include './phpScripts/user.class.php';

$user = new User(8);

//connect to database
$con = new Data();
$con = $con->connect();

//check for async post request of user's general info
if(isset($_POST['fname'])){
  //sanitize the data
  $first_name = $_POST['fname'];
  $last_name = $_POST['lname'];
  $email = $_POST['email'];
  
  //create query statement. Id is hard coded for testing                                              
  $update = <<< EOT
    update user set first_name = '$first_name', last_name = '$last_name', email = '$email' where user_id = 8
EOT;
  
  //submit query                                                   
  mysqli_query($con, $update);
}

//check for user async request for password update
if(isset($_POST['password'])){
  //sanitize input
  $password = mysqli_real_escape_string($con, strip_tags($_POST['password']));
 //create query statement. Id hard coded for testing
 $update = <<< EOT
 update user set password = '$password' where user_id = 8
EOT;
 
 //submit query
  mysqli_query($con, $update);                                       
}  
                                                    

?>

  <!doctype html>
  <html>

  <head>
    <?php addBoot() ?>
    <title>Profile</title>

    <link rel='stylesheet' type='text/css' href='./styles/profile.css'>
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
      <div class="jumbotron jumbotron-fluid" id='jumbotron'>
        <div class="container" id='login-jumbo'>
          <h1 class="display-4">Hello,
            <?= $user->get_first_name(); ?>
          </h1>
          <p class="lead">You can review and make changes to your profile.</p>
        </div>
      </div>
      
      <!---display alert if passwords do not match-->
      <div class="alert alert-danger hide" id='alert' role="alert">
        A simple danger alert—check it out!
      </div>

      <div class='row'>
        <div class='col-sm-12 col-md-6'>
          <!--Form for changing password-->
          <form id='password_form'>
            <fieldset>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name='password' id="password" aria-describedby="password"
                       required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must have upper and lowercase letter and include at least one number">
              </div>
              <div class="form-group">
                <label for="repass">Confirm:</label>
                <input type="password" class="form-control" name='repass' id="repass"
                       required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must have upper and lowercase letter and include at least one number">
              </div>
              <button id='passwordInfo' class="btn btn-primary">Update Password</button>
            </fieldset>
          </form>
        </div>
        <div class='col-sm-12 col-md-6'>
          <form>
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
              <button id='user_info'  class="btn btn-primary">Update</button>
            </fieldset>
          </form>
        </div>
      </div>

    </div>

    <?php addBootJs() ?>
    <script src='jsScripts/profile.js'></script>
  </body>

  </html>
