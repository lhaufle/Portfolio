<?php
include './phpScripts/template.php';
include './phpScripts/Data.php';
include './phpScripts/functions.php';

//create connection
$con = new Data();
$con = $con->connect();

$is_valid_email = false;

//check if request came over via get
if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if(!empty($_GET['email'])){
    
  $email = mysqli_real_escape_string($con, strip_tags($_GET['email']));
    
    //create select statement
    $select = <<< EOT
    select * from user where email = '$email'
EOT;
    
    //query results
    $results = mysqli_query($con, $select);
    
    //check to see if a result was returned
    $number = mysqli_num_rows($results);
    
    if($number > 0){
      $is_valid_email = true;
    } 
  }
}

//check if requerst was sent via post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //more coming later
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
                <a class="nav-link" href="home.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
               <li class="nav-item">
                <a class="nav-link active" href="signUp.php">SignUp</a>
              </li>
            </ul>
          </div>
      </nav>
      
      <?php
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
          <input type="password" class="form-control" id="password" required>
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
