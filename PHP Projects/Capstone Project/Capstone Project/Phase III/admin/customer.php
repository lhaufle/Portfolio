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
    $address = strip_tags($_POST['address']);
    $creditID = strip_tags($_POST['creditID']);
    $consultantID = strip_tags($_POST['consultantID']);
    $email = strip_tags($_POST['email']);
    $phNumber = strip_tags($_POST['phNumber']);
    
    addCustomer($firstName, $lastName, $address, $creditID, $consultantID, $email, $phNumber, $id);
  }

?>

<?php include("../template/template.php");?>

<?php displayHeader("Customer Profile") ?>

<div class="container">
  
   <!-- NavBar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
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
        <a class="nav-link" href="#">Customer</a>
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
  displayJumbo("Customer", "Add Edit or Delete");

  if($updateDone == true){
    echo "<h2>".$_COOKIE['Updated']."</h2>";
  }
?> 
  
 <form action="customerUpdate.php" method="POST">
   
   <!----------Select the customer--------------->
   <div class="form-group">
     <label for="selectCustomer">Select Customer to Edit or Delete:</label>
    <select multiple class="form-control" id="selectCustomer" name="customer">
       <?php displayCustomerList($id)?>
    </select>
   </div>
   
   <div class="form-group">
     <button type="submit" class="btn btn-primary mb-2">Select Customer</button>
   </div>
   
  </form>
   
   
<form action="customer.php" Method="Post">
  
<div class="form-group">
    <label for="firstName" class="labelCustomer">First Name:</label>
    <input type="text" id="firstName" name="firstName" class="form-control"   required/>
 </div>
  
  <div class="form-group">
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" class="form-control"  required/>
 </div>
  
  <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" class="form-control"  required/>
  </div>
    <div class="form-group">
      <label for="creditID">Credit Id:</label>
    <select class="form-control" id="creditID" name="creditID">
      <?php displayCredit() ?>
    </select>
  </div>
  
  <div class="form-group">
      <label for="consultantID">Consultant Id:</label>
      <select class="form-control" id="consultantID" name="consultantID">
      <?php displayConsult() ?>
      </select>
  </div>
  
  <div class="form-group">   
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control"  required/>
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