<?php
    ini_set( "display_errors", 0);
      session_start();
      $id = $_SESSION["id"];
    include("../template/database.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){ //check for post
       $idNumber = $_POST['customer']; //get id to use for initilizing customer object
      
      $customer = new customer($idNumber); //create customer object
      $credit = new credit($customer->getCreditID()); //create credit object
      $consultant = new consultant($customer->getConsultantID()); //create consultant object
    }
  
    if($_SERVER['REQUEST_METHOD'] =="GET"){
      
    $firstName = strip_tags($_GET['firstName']);
    $lastName = strip_tags($_GET['lastName']);
    $address = strip_tags($_GET['address']);
    $creditID = strip_tags($_GET['creditID']);
    $consultantID = strip_tags($_GET['consultantID']);
    $email = strip_tags($_GET['email']);
    $phNumber = strip_tags($_GET['phNumber']);
    $idnum = strip_tags($_GET['id']);
            
      updateCustomer($firstName, $lastName, $address, $creditID, $consultantID, $email, $phNumber, $id, $idnum);
      echo"$firstName, $lastName, $address, $creditID, $consultantID, $email, $phNumber, $id, $idnum";
      
      header('Location: customer.php');
      setcookie('Updated', 'Record updated!', time() + 10);
      exit;
    }
      
?>


<?php include("../template/template.php");?>

<?php displayHeader("Customer Profile") ?>

<div class="container">
  
<?php
  displayJumbo("Customer", "Update Or Delete");
?> 
  
<form action="customerUpdate.php" Method="GET">
  
<div class="form-group">
    <label for="firstName" class="labelCustomer">First Name:</label>
    <input type="text" id="firstName" name="firstName" class="form-control" value ="<?php echo $customer->getFirstName()?>"  required/>
 </div>

  
  <div class="form-group">
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" class="form-control" value ="<?php echo $customer->getLastName()?>"  required/>
 </div>
  
 <div class="form-group">
    <label for="id" class="labelCustomer">ID (read only):</label>
    <input type="text" id="id" name="id" class="form-control" value ="<?php echo $customer->getID()?>"  readonly/>
 </div>
  
  <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" class="form-control" value ="<?php echo $customer->getAddress()?>"  required/>
  </div>
  
    <div class="form-group">
      <label for="creditID">Credit Id:</label>
    <select class="form-control" id="creditID" name="creditID">
      <option selected value ="<?php echo $customer->getCreditID()?>"> <?php echo $credit->getLastName()?></option>
      <?php displayCredit() ?>
    </select>
  </div>
  
  <div class="form-group">
      <label for="consultantID">Consultant Id:</label>
      <select class="form-control" id="consultantID" name="consultantID">
      <option selected hidden><?php echo $consultant->getLastName()?></option>
      <?php displayConsult() ?>
      </select>
  </div>
  
  <div class="form-group">   
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" class="form-control" value ="<?php echo $customer->getEmail()?>"  required/>
  </div>
  
  <div class="form-group">
      <label for="phNumber">Phone Number</label>
      <input type="text" id="phNumber" name="phNumber" class="form-control" value ="<?php echo $customer->getPhoneNumber()?>"  required/>
  </div>
 
  <div class="form-group">
      <input type="submit" value="update"/>
      <input type="submit" formaction="customerDelete.php" value="Delete" />
      <button id="back">Back</button>
  </div>
  
</form>
  

<?php displayFooter() ?>
