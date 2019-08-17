<?php include("../template/database.php");
ini_set( "display_errors", 0);
  session_start();
  $id = $_SESSION["id"];
?>

<?php include("../template/template.php");?>

<?php displayHeader("Admin Portal") ?>

<div class="container">
  
   <!-- NavBar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sysco Consulting</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customer.php">Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="credit.php">Credit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultant.php">Consultant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
  
<?php
  displayJumbo("Admin", "Manager Users");

  echo"<h3>Customers missing a assingment to an analyst or consultant</h3>";

  missingAssignments();
?> 
  
  
<?php displayFooter() ?>
