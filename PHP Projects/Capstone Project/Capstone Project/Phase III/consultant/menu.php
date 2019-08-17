<?php 
 ini_set( "display_errors", 0); 
 session_start();
 $id = $_SESSION["id"];
?>
<?php include("../template/database.php"); ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $id = $_POST['select'];
    }
?>

<?php include("../template/template.php"); ?>

<?php displayHeader("Consultant Portal") ?>

<div class="container">

 <!-- NavBar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sysco Consulting</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="menu.php">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customerMessage.php">Customer Message</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<?php
  displayJumbo("Consultant", "Check customer menu items");
?> 
  
  <form class="form-inline" action="menu.php" method="POST">
     <div class="form-group mb-2">
    <label for="customerSelect">Select Customer:  </label>
    </div>
  <div class="form-group mx-sm-3 mb-2">
    <select class="form-control" id="customerSelect" name="select">
     <?php selectCustomerConsultant($id) //--------------will not be hard coded after login created?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Select</button>
</form>  
  
  
    <!--Display Menu Item-->
<?php displayCustomerMenu($id);?>
  
  
  
  
  
  
  