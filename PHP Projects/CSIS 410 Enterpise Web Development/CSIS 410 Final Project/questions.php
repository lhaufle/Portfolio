<?php 
     ini_set('display_errors', 0);
    session_start();
    if($_SESSION['access'] == 'admin'){ //verify an admin has signed in
      $access = 'admin';
    }elseif($_SESSION['access'] == 'publisher'){ //verify a publisher  has signed in 
      $access = 'publisher';
    }elseif($_SESSION['access'] =='customer'){ //verify a customer has signed in
      $access = 'customer';
    }
    include("templates/template.php");
    displayHeader("Questions");
?>

<div id="wrapper">
  

<?php
  displayMenu($access);
?>
  
<?php
  displayPageHeader("Questions");
?>
  
<?php

//check if post has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if((!empty($_POST['name'])) && (!empty($_POST['email'])) && (!empty($_POST['comment']))){
     echo'<div id="loginForm">
             <div id="background">
             <h2 class="tryAgain">Your Question was Submitted</h2>
             </div>
             </div>';
  }else{
    echo'<div id="loginForm">
             <div id="background">
             <h2>Missing name, email, or password</h2>
             <a href="questions.php"><h2>&rArr; Please try again</h2></a> 
             </div>
             </div>';
  }
} else{
  echo '<div class="rateSessionsBackground">
    <div class="rateCenter">
      <form action="questions.php" method="post">
        <p>
          <label for="name">Name:</label>
          <input type="text" name="name" id="name"/>
        </p>
        <p>
          <label for="email">Email:</label>
          <input type="text" name="email" id="email"/>
        </p>
        <p>
          <label for="text">Question:</label>
        </p>
        <p>
          <textarea rows="4" cols="50" name="comment" id="text"></textarea>
          <input type="submit" value="Submit" id="ratingSubmit"/>
        </p>        
      </form>
    </div>
  </div>';
}
  
?>
  
<?php
 displayFooter();
?>