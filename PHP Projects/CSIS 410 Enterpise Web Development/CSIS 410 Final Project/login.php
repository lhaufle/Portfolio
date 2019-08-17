<?php 
   error_reporting(0);
    session_start();
    if($_SESSION['access'] == 'admin'){ //verify an admin has signed in
      $access = 'admin';
    }elseif($_SESSION['access'] == 'publisher'){ //verify a publisher  has signed in 
      $access = 'publisher';
    }elseif($_SESSION['access'] =='customer'){ //verify a customer has signed in
      $access = 'customer';
    }
    include("templates/connection.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST'){ //check if post has been submitted
  
  if((!empty($_POST['login'])) && (!empty($_POST['password'])) ){ //verify entry of both boxes
    $access = $_POST['authorization'];
    $userName = $_POST['login'];
    $password = strtolower($_POST['login']);
    $select = "SELECT * FROM Users WHERE UserName = '{$_POST['login']}'"; //create query
    $user = mysqli_query($dbs, $select); 

    $row = mysqli_fetch_array($user); //pass results to variable
    
    if($row['Privilege'] == $access && $row['UserName'] == $userName && $row["Pass"] == $password){
      
      //create session as access key based on privilege
      if($row['Privilege'] == 'admin'){
        $_SESSION['access'] = 'admin';
      } elseif($row['Privilege'] == 'publisher'){
        $_SESSION['access'] = 'publisher';
      } elseif($row['Privilege'] == 'customer'){
        $_SESSION['access'] = 'customer';
      }
        $_SESSION['name'] = $row['UserName'];
        $_SESSION['id'] = $row['ID'];
        
        $id = $row['ID'];
        //track the login time
        $insert = "INSERT INTO `LoginTracker`(`userID`) VALUES ($id)";
        mysqli_query($dbs, $insert);
      
        //direct to home page
         header("Location:index.php");
    }else{
      //username or password is wrong
      $wrongPass = TRUE;
    }
       
  }else{
    //username or password not entered
    $notAuthorized = TRUE;
  } 
  } else{
    $showForm = TRUE;
  }
    include("templates/template.php");
?>

<div id="wrapper">
  

<?php
 displayHeader("Login");
 displayMenu($access);
 displayPageHeader("Login");
?>
  
  
  
<?php
 

  if($wrongPass){
          //username or password is wrong
      echo'<div id="loginForm">
             <div id="background">
             <h2>That is incorrect or you are not Authorized at that level</h2>
             <a href="login.php"><h2>&rArr; Please try again</h2></a> 
             </div>
             </div>';
  }

 if($notAuthorized){
       //username or password not entered
    echo'<div id="loginForm">
         <div id="background">
         <h2>Please enter both username and password</h2>
         <a href="login.php"><h2 class="tryAgain">&rArr; Please try again</h2></a>
         </div>
         </div>';  
 }

if($showForm){
    //display the for if post has not been submitted
  echo'<div id="loginForm">
  <div id="background">
    <h3>Please Login</h3>
  <form action="login.php" method="post">
    <p>
     <label for="userType">Select Authorization</label>
     <select name="authorization" id="userType">
         <option value="admin">Administrator</option>
         <option value="publisher">Publisher</option>
         <option value="customer">Customer</option>
     </select>
    </p>
    <p>
     <label for="login">UserName:</label>
     <input type="text" name="login" id="login"/>
    </p>
    <p>
     <label for="password">Password:</label>
     <input type="password" name="password" id="password"/>
     <input type="submit" id="login-button" value="login"/>
    </p>
  </form>
  </div>
  </div>';
}

?>
  
  
  
<?php
  displayFooter();
 ?>


