<?php
   // ini_set( "display_errors", 0);
    include("../template/database.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){ //check for post
       $id = $_POST['consultant']; //get id to use for initilizing customer object
       $consultant = new consultant($id); //create credit object
    }
  
    if($_SERVER['REQUEST_METHOD'] =="GET"){
      
    $firstName = strip_tags($_GET['firstName']);
    $lastName = strip_tags($_GET['lastName']);
    $email = strip_tags($_GET['email']);
    $officeID = strip_tags($_GET['officeID']);
    $phNumber = strip_tags($_GET['phNumber']);
    $consultantID = strip_tags($_GET['consultantID']);
      
      echo "$firstName, $lastName, $email, $officeID, $phNumber, $consultantID";
               
      updateConsultant($firstName, $lastName, $email, $officeID, $phNumber, $consultantID);
      
      header('Location: consultant.php');
      setcookie('Updated', 'Record updated!', time() + 10);
      exit;
    }
      
?>


<?php include("../template/template.php");?>

<?php displayHeader("Consultant Profile") ?>

<div class="container">
  
<?php
  displayJumbo("Consultant", "Update Or Delete");
?> 
  
<form action="consultantUpdate.php" Method="GET">
  
<div class="form-group">
    <label for="firstName" class="labelCustomer">First Name:</label>
    <input type="text" id="firstName" name="firstName" class="form-control" value = "<?php echo $consultant->getFirstName()?>"  required/>
 </div>
  
  <div class="form-group">
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" class="form-control" value = "<?php echo $consultant->getLastName()?>" required/>
 </div>
  
 <div class="form-group">
    <label for="id" class="labelCustomer">ID (read only):</label>
    <input type="text" id="id" name="consultantID" class="form-control" value ="<?php echo $consultant->getID()?>"  readonly/>
 </div>
  
<div class="form-group">
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" class="form-control" value = "<?php echo $consultant->getEmail()?>"  required/>
</div>
  
<div class="form-group">
      <label for="officeID">Office ID:</label>
      <select class="form-control" id="officeID" name="officeID" >
        <option selected value ="<?php echo $consultant->getOfficeID()?>"> </option>
      <?php displayOffice() ?>
      </select>
</div>
  
<div class="form-group">
      <label for="phNumber">Phone Number</label>
      <input type="text" id="phNumber" name="phNumber" class="form-control" value = "<?php echo $consultant->getPhoneNumber()?>"  required/>
</div>
 
  <div class="form-group">
      <input type="submit" value="update"/>
      <input type="submit" formaction="consultantDelete.php" value="Delete" />
      <button id="consultantBack">Back</button>
  </div>
  
</form>
  

<?php displayFooter() ?>
