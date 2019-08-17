<?php include("../template/database.php");
 ini_set( "display_errors", 0);
 session_start();
 $id = $_SESSION["id"];
?>
<?php include("../template/template.php");?>

<?php displayHeader("Customer Portal") ?>

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
        <a class="nav-link" href="financials.php">Financials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="menu.php">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="message.php">Message</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
  
<?php
  displayJumbo("Home", "Progress at a glance");
?> 
  
<div class="card-deck">
    <?php showFinancials($id) //----------change location_ID with session location id later ?> 
</div>

  
<?php displayFooter() ?>