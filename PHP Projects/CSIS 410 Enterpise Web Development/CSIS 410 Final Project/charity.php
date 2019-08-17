<?php 
    ini_set('display_errors', 0);
    session_start();
    if($_SESSION['access'] == 'admin'){ //verify an admin has signed in
      $access = 'admin';
    }elseif($_SESSION['access'] == 'publisher'){ //verify a publisher  has signed in 
      $access = 'publisher';
    }elseif($_SESSION['access'] =='customer'){ //verify a customer has signed in
      $access = 'customer';
    }
    include("templates/template.php");
    include("templates/template.php");
    displayHeader("Charity");
?>

<div id="wrapper">
  

<?php
  displayMenu($access);
?>
  
<?php
  displayPageHeader("Charity");
?>
  
  <div class="charityContainer">
    <div id="charityPicture">
      <img src='images/baby-md.jpg' alt="baby"/>
    </div>
      
    <div id="charityText">
      <h2>We are here for you <span id="heart">&#10084;</span></h2>
     <p>
        The picture of this baby is cute; she appears to be vibrant and full of life. 
        For some parents, they will not experience this becuase their baby is born without life. 
        While this time is hard, we want want to help you preserve memories by taking photos of the treasure you carried inside of you. 
        This is offered without charge; if we can help you during this time, please <span id="contact"><a href="questions.php">contact us.</a></span> 
      </p>  
      <p>
        <i>“Before I formed you in the womb I knew you,
         and before you were born I consecrated you..." (Jer. 1:5, ESV). </i>
      </p>
    </div>
  </div>
  
<?php
  displayFooter();
 ?>