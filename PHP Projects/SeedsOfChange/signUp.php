<?php
include './phpScripts/template.php';
include './phpScripts/Data.php';

//boolean variables to check for problems with post
$alreadyExists = false;
$postedOk = false;



//check if a post request was sent
if($_SERVER['REQUEST_METHOD'] = 'POST'){
  //double check all parameters
  if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && 
     isset($_POST['password']) && isset($_POST['repass']) ){
    //assigning to variables for query after stripping possible tags
    $firstName = strip_tags($_POST['firstName']);
    $lastName = strip_tags($_POST['lastName']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $repass = strip_tags($_POST['repass']);
    
    //creat query string to make sure email doesn't already exist
    $exist = <<< EOT
    select * from user where email = '$email'
EOT;
    
    //create query for insert statement
    $insert = <<< EOT
    insert into user(first_name, last_name, email, password) values('$firstName', '$lastName','$email','$password')
EOT;
    
    //create database oject and connection
    $con = new Data();
    $con = $con->connect();
    
    //get count of duplicates
    $duplicate = mysqli_query($con, $exist);
    
    $dupNumber = mysqli_num_rows($duplicate);
    
    //verify that the entry is not a duplicate and display proper warning or complete insert
    if($dupNumber > 0){
      $alreadyExists = true;
      $postedOk = false;
    } else {
      mysqli_query($con, $insert);
    }
  
  }else{
    $postedOk = false;
  }
}

?>

<!doctype html>
<html>
  <head>
    <?php addBoot() ?>
    <title>Sign Up</title>
    
    <link rel='stylesheet' type='text/css' href='./styles/styles.css'>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> 
  </head>
  <body>
    
    
      
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
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active nav-custom-color" href="#">SignUp</a>
      </li>
    </ul>
  </div>
    </div>
</nav>
    
    
    <!---------Jumbotron------------>
<div class="jumbotron jumbotron-fluid" id='jumbotron'>
  <div class="container" id='login-jumbo'>
    <h1 class="display-4">Sign Up</h1>
    <p class="lead">Do your part and change the future!</p>
  </div>
</div>
    
    <!------Only displays the error message if the passwords do not match with javascript validation-->

    
    <!--------Displays an error if the email address is already in the database------>
    <?php 
      if($alreadyExists){
        
        $showMessage = <<< EOT
        <div class="alert alert-danger text-center" role="alert">
           That email already exists
        </div>
EOT;
        echo $showMessage;
      }
    ?>
    
      <div id='password_error' class='password_error'>
         <p>
          Passwords do not match!
          </p>
      </div>
  
    <!--Sign-up form-->
    <form action='signUp.php' method='post'>
      <fieldset>
        <h1>
          Create an Account
          <img src='./images/leaf.png'/>
        </h1>
        <label>First Name:</label>
        <input type='text' name='firstName' id='firstName' required>
        <label>Last Name:</label>
        <input type='text' name='lastName' id='lastName' required>
        <label>Email:</label>
        <input type='email' name='email' id='email' required>
        <label>Password:</label>
        <input type='password' name='password' id='password' required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must have upper and lowercase letter and include at least one number">
        <label>Re-enter Password:</label>
        <input type='password' name='repass' id='repass'>
        <input type='submit' value='Create Account' id='submit' required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must have upper and lowercase letter and include at least one number"/>
      </fieldset>
    </form>
    <?php addBootJs() ?>
    <script src='jsScripts/script.js'></script>
  </body>
</html>