<?php include("../template/database.php");
     //ini_set( "display_errors", 0);
     session_start();
     $showError = false;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      
      $userName = strip_tags($_POST['email']); //get the user name
      $pass = strip_tags($_POST['password']); //get the password
      
      //select the user based on the information
      $select = "select * from access where user_name = \"$userName\" AND user_password = \"$pass\"";
      
      //submit the query
      $result = mysqli_query($dbc, $select);
      
      //test results
      if (mysqli_num_rows($result) <= 0)
      {
        $showError = true;
      }
      
      while($row = mysqli_fetch_array($result)){
        $type = $row['type'];
        
        
        //check use type and designate proper id accordingly then direct to login page
        if($type == 'customer'){
          $_SESSION["id"] = $row['customer_id'] ;
          echo"<script> window.location.href = \"../customer/home.php\"; </script>";
        }
        if($type == 'credit'){
          $_SESSION["id"] = $row['credit_id'] ;
          echo"<script> window.location.href = \"../credit/home.php\"; </script>";
        }
         if($type == 'consultant'){
          $_SESSION["id"] = $row['consultant_id'] ;
           echo"<script> window.location.href = \"../consultant/home.php\"; </script>";
        } 
        if($type == 'admin'){
           $_SESSION["id"] = $row['admin_id'] ;
          echo"<script> window.location.href = \"../admin/home.php\"; </script>";
         }
        
        
      }
      
    }
      
    
?>

<?php include("../template/template.php");?>


<?php displayHeader("Login") ?>

<div class='container'>
  


<?php
  displayJumbo("Login", "Enter Username and Password");

  //display error message for incorrect login
  if($showError == true){
    echo "<h2>Incorrect username or password!</h2>";
  }
?> 

<form action='login.php' method='POST'>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
  </div>

<?php displayFooter() ?>