<?php
session_start();

include './phpScripts/template.php';
include './phpScripts/Data.php';

//flag to let user know if login failed
 $loginFailed = false;

//validate request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    

    
    //create database connection
    $con = new Data();
    $con = $con->connect();
  
    //create query
    $select = <<< EOT
    select * from user where email = '$email' and password = '$password'
EOT;
 
    //query with user input
    $results = mysqli_query($con, $select);
    
    //get number of rows
    $dupNumber = mysqli_num_rows($results);
    
    //verity that the query returned a result
    if($dupNumber > 0){
      //assign the value of the user_id to the session
      $row = mysqli_fetch_array($results);
      $_SESSION['user_id'] = $row['user_id'];
      //redirect to user's home page
      header('location:tracking.php');
      exit();
    } else {
      $loginFailed = true;
    }
     
  }
  
}

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
                <a class="nav-link active" href="#">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-custom-color" href="signUp.php">SignUp</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <?php  
      //display error if the login fails
        if($loginFailed){
           $showMessage = <<< EOT
           <div class="alert alert-danger text-center" role="alert">
             That email already exists
           </div>
EOT;
        echo $showMessage;
        }
      ?>

        <div class='row'>
          <div class='col-md-6 col-sm-12' id='login-bg' >
            <div id='login-bg-text'>
            <p>
              <q> Conservation is a great moral issue, for it involves the patriotic duty of insuring the safety and continuance of the nation.</q>
            </p>
            <p>
              -Theodore Roosevelt
            </p>
            </div>
          </div>
          <div class=' col-md-6 col-sm-12'>
            <form action='login.php' method='post'>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name='email' id="email" aria-describedby="email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name='password' class="form-control" id="password">
              </div>
              <button type="submit" id='loginButton' class="btn btn-primary">Login</button>
            </form>
          </div>
      </div>
      
    </div>
    <?php addBootJs() ?>
    <script src='jsScripts/script.js'></script>
  </body>

  </html>
