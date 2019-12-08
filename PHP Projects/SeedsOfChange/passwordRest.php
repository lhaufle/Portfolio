<?php
ini_set( "display_errors", 0);
session_start();
include './phpScripts/template.php';
include './phpScripts/Data.php';
include './phpScripts/functions.php';

//create connection
$con = new Data();
$con = $con->connect();

//check if request came over via get
if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if(!empty($_GET['email'])){
    
  //sanitize passed input
  $email = mysqli_real_escape_string($con, strip_tags($_GET['email']));
    $is_valid_email = false;
    //create select statement
    $select = <<< EOT
    select * from user where email = '$email'
EOT;
    
    //query results
    $results = mysqli_query($con, $select);
    //get access to values returned from query
    $row = mysqli_fetch_assoc($results);
    //assign number of results to variable
    $number = mysqli_num_rows($results);
    
    //verify the number of results is more than one
    if($number > 0){
      $is_valid_email = true;
      //create a random password
      $randPass = randomPassword();
      //create update query
      $update = <<< EOT
      update user SET password = '$randPass' where user_id = {$row['user_id']}; 
EOT;
      
      //update database
      mysqli_query($con, $update);
      //send email
      sendPassword($email, $randPass);
      //close database
      mysqli_close($con);
      
    } 
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(!empty($_POST['password'])){
    
    $password = $_POST['password'];
    
    //create database object and connect
    $con = new Data();
    $con = $con->connect();
    
    //create query
    $select = <<< EOT
    select * from user where password = '$password';
EOT;
    
    //submit query
    $result = mysqli_query($con, $select);
    //check number of results
    $numRows = mysqli_num_rows($result);
    //verify the number is greater than one
    if($numRows > 0){
      //create array values from row
      $row = mysqli_fetch_assoc($result);
      //pass id as the value to session
      $_SESSION['user_id'] = $row['user_id'];
      //redirect to the tracking page
      header('location:tracking.php');
      exit();
    } else{
      $is_valid_email = true; //toggle this so both errors do no show
      $wrongPass = true;
    }   
  }
}

?>

  <!doctype html>
  <html>

  <head>
    <?php addBoot() ?>
    <title>Password Reset</title>

    <link rel='stylesheet' type='text/css' href='./styles/login.css'>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  </head>

  <body>

    <div class='container'>
      <!------------Nav Bar------------>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
        <a class="navbar-brand" id='navbar-brand' href="#">SEEDS OF CHANGE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </nav>

      <?php
  
  
    if($wrongPass){
         $noPass = <<< EOT
          <div class="alert alert-danger text-center" role="alert">
            Password did not match
          </div>
EOT;
      echo $noPass;
    }
      //display the form if the email address exists
      if($is_valid_email){
        
        $displayForm = <<< EOT
       <div class='row'>
        <div class='col-sm-12 col-md-10 col-lg-8 mx-auto'>
         <form action='passwordRest.php' method='post'>
        <div class="form-group">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name='password' id="password" required>
          <small id="password help" class="form-text text-muted">Check you email(and your spam)</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        </div>
      </div>
EOT;
        echo $displayForm;
        
      } else {
        //diplay an error if the email address does not exist
        
        $noEmail = <<< EOT
          <div class="alert alert-danger text-center" role="alert">
            Email address does not exist
          </div>
EOT;
        echo $noEmail;
      }
            
       ?>

    </div>

    <?php addBootJs() ?>
    <script src='jsScripts/login.js'></script>
  </body>

  </html>
