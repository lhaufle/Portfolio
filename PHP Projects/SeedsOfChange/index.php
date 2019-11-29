<?php
include './phpScripts/template.php';

?>

<!doctype html>
<html>
  <head>
    <?php addBoot() ?>
    <title>Sign Up</title>
    
    <link rel='stylesheet' type='text/css' href='styles.css'>
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
    
    <!------Only displays the error message if the passwords do not match-->
    <div id='password_error' class='password_error'>
      <p>
         Your passwords do not match!
      </p>
    </div>
    <!--Sign-up form-->
    <form action='index.php' method='post'>
      <fieldset>
        <h1>
          Create an Account
          <img src='leaf.png'/>
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
        <input type='submit' value='Create Account' id='submit' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must have upper and lowercase letter and include at least one number"/>
      </fieldset>
    </form>
    <?php addBootJs() ?>
    <script src='script.js'></script>
  </body>
</html>
