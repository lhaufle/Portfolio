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
    include("templates/connection.php");
    include("templates/template.php");
    displayHeader("Sign Up");
?>

<div id="wrapper">
  

<?php
  displayMenu($access);
?>
  
<?php
  displayPageHeader("Sign Up");
?>
  
<?php

//check if post has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if((!empty($_POST['email'])) && (!empty($_POST['passwordOne'])) && (!empty($_POST['passwordTwo']))){
    if($_POST['passwordOne'] == $_POST['passwordTwo']){
         $select = "SELECT * FROM Users WHERE UserName = '{$_POST['email']}'"; //create query
         $user = mysqli_query($dbs, $select);
         $row = mysqli_fetch_array($user);
         if($_POST['email'] != $row['UserName']){ //verify existing username does not exist
          $newUser = "INSERT INTO `Users`(`UserName`, `Pass`, `Privilege`) VALUES ('{$_POST['email']}', '{$_POST['passwordOne']}', 
                                          'customer')";
           mysqli_query($dbs, $newUser);           
             echo'<div id="loginForm">
             <div id="background">
             <h2 class="tryAgain">Your are signed up</h2>
             </div>
             </div>';
         }else{
             echo'<div id="loginForm">
             <div id="background">
             <h2>User Name already exists</h2>
             <a href="signup.php"><h2>&rArr; Please try again</h2></a> 
             </div>
             </div>';
         }

       } else{
              echo'<div id="loginForm">
             <div id="background">
             <h2>Password does not match</h2>
             <a href="signup.php"><h2>&rArr; Please try again</h2></a> 
             </div>
             </div>';
              }     
  }else{
    echo'<div id="loginForm">
             <div id="background">
             <h2>Missing name, username, or email</h2>
             <a href="signup.php"><h2>&rArr; Please try again</h2></a> 
             </div>
             </div>';
  }
} else{
  echo '<div class="rateSessionsBackground">
    <div class="rateCenter">
      <form action="signup.php" method="post">
        <p>
          <label for="name">Email:</label>
          <input type="text" name="email" id="name"/>
        </p>
        <p>
          <label for="email">Password:</label>
          <input type="password" name="passwordOne" id="email"/>
        </p>
        <p>
          <label for="email">Re-enter Password:</label>
          <input type="password" name="passwordTwo" id="email"/>
          <input type="submit" id="login-button" value="Sign Up"/>
        </p>             
      </form>
    </div>
  </div>';
}
  
?>
  
<?php
 displayFooter();
?>