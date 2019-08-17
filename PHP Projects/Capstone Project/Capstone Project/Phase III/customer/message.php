<?php 
include("../template/database.php"); 
 session_start();
 $id = $_SESSION["id"];
?>
  
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    
   if(!empty($_POST['message']))
      $message = strip_tags($_POST['message']);
        $customer = new customer($id); //----------replace with session id when ready
        //submit input into the database
        sendMessage($customer->getID(), $customer->getConsultantID(), $message, $customer->getLastName());
     }
?>

<?php include("../template/template.php"); ?>

<?php
  displayHeader("Message Portal");
?>

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
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="financials.php">Financials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="menu.php">Menu</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="message.php">Message</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
  
<?php
  displayJumbo("Message", "");
?> 
  
  <!--Enter Message-->
<div class="container">
  <div class="row">
  
  
    <div class="col">
		<form class="itemForm" action = 'message.php', method="post">
		<!--Menu Description-->
		<div class="form-group">
    		<label for="message"> Message:</label>
    		<textarea class="form-control" id="message" name="message" rows="3" Required></textarea>
  	</div>
	 <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
  </div>
</div>

<br/>

	<!--Display Message-->
  <div class="col">
	  <?php showMessage($id); //--------replace with session id when ready ?>
	</div>


<?php
  displayFooter();
?>