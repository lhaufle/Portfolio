<?php include("../template/database.php"); 
  ini_set( "display_errors", 0);
  session_start();
  $id = $_SESSION["id"];

  $updateDone = false;

  if(isset($_COOKIE['Updated'])){
     $updateDone = true;
  }

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])){
$firstName = strip_tags($_POST['firstName']);
$lastName = strip_tags($_POST['lastName']);
$email = strip_tags($_POST['email']);
$officeID = strip_tags($_POST['officeID']);
$phNumber = strip_tags($_POST['phNumber']);

addConsultant($firstName, $lastName, $email, $officeID, $phNumber); 
  
}


?>

<?php include("../template/template.php");?>

<?php displayHeader("Consultant Profile") ?>

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
      <li class="nav-item">
        <a class="nav-link" href="customer.php">Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="credit.php">Credit</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Consultant</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
  
<?php
  displayJumbo("Consultant", "Add a consultant");
?> 
  
  <form action="consultantUpdate.php" method="POST">
   
   <!----------Select the customer--------------->
   <div class="form-group">
     <label for="selectConsultant">Select Consultant to Edit or Delete:</label>
    <select multiple class="form-control" id="selectCredit" name="consultant">
       <?php displayConsultantList()//replace after testing?>
    </select>
   </div>
   
   <div class="form-group">
     <button type="submit" class="btn btn-primary mb-2">Select Analyst</button>
   </div>
   
  </form>
   
<form action="consultant.php" Method="POST">
  
<div class="form-group">
    <label for="firstName" class="labelCustomer">First Name:</label>
    <input type="text" id="firstName" name="firstName" class="form-control" pattern="^[a-zA-Z]{2,20}$"  required/>
 </div>
  
  <div class="form-group">
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" class="form-control" pattern="^[a-zA-Z]{2,20}$"  required/>
 </div>
  
<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control"  required/>
</div>
  
<div class="form-group">
      <label for="officeID">Office ID:</label>
      <select class="form-control" id="officeID" name="officeID">
      <?php displayOffice() ?>
      </select>
</div>
  
<div class="form-group">
      <label for="phNumber">Phone Number</label>
      <input type="text" id="phNumber" name="phNumber" class="form-control" pattern = "[1-9]{3}-[1-9]{3}-[1-9]{4}"  required/>
</div>
 
<input type="hidden" name="add" value='add'/>
 
<div class="form-group">
      <input type="submit" value="ADD"/>
</div>
   
</form>
  
<?php displayFooter() ?>
