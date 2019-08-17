<?php 
    ini_set('display_errors', 0);
    if($_SESSION['access'] == 'admin'){ //verify an admin has signed in
    $access = 'admin';
    }elseif($_SESSION['access'] == 'publisher'){ //verify a publisher  has signed in 
      $access = 'publisher';
    }elseif($_SESSION['access'] =='customer'){ //verify a customer has signed in
      $access = 'customer';
    }
    include("templates/template.php");
    displayHeader("Mission");
?>

<div id="wrapper">
  

<?php
  displayMenu($access);
?>
  
<?php
  displayPageHeader("Mission");
?>
  
  <div id="missionBackground">
    
  <div class = "factsContainer">
    <div class="flex-container">
      <div class="title-container"> 
        <h3>
          Mission
        </h3>
      </div>
      <div class="text-container">
        <p>
          My Goal is not to just take pictures.
          I want my life and busines to point others to Christ, so they will put theri faith in him. 
        </p>
      </div>
    </div>
    <div class="flex-container">
      <div class="title-container">  
        <h3>
          Love
        </h3>
      </div>
      <div class="text-container">
       <p>
        <i> "For God so loved the world, that he gave his only Son, 
         that whoever believes in him should not perish but have eternal life" (John 3:16, ESV)</i>
        </p>
      </div>
    </div>
    <div class="flex-container">
      <div class="title-container">   
        <h3>
          Sin
        </h3>
      </div>
      <div class="text-container">
        <p>
         <i>"for all have sinned and fall short of the glory of God" (Romans 3:23, ESV).</i>
        </p>
      </div>
    </div>
    <div class="flex-container">
      <div class="title-container">   
        <h3>
          Penalty
        </h3>
      </div>
      <div class="text-container">
        <p>
         <i>"For the wages of sin is death..." (Romans 6:23, ESV).</i>
        </p>
      </div>
    </div>
    <div class="flex-container">
      <div class="title-container">   
        <h3>
          Payment
        </h3>
      </div>
      <div class="text-container">
        <p>
         <i>"but God shows his love for us in that while we were still sinners, Christ died for us." (Romans 5:8, ESV).</i>
        </p>
      </div>
    </div>
    <div class="flex-container">
      <div class="title-container">   
        <h3>
          Repentance
        </h3>
      </div>
      <div class="text-container">
        <p>
         <i>"...The time is fulfilled, and the kingdom of God is at hand;repent and believe in the gospel." (Mark 1:15, ESV).</i>
        </p>
      </div>
    </div>
    <div class="flex-container">
      <div class="title-container">   
        <h3>
          Faith
        </h3>
      </div>
      <div class="text-container">
        <p>
         <i>"For by grace you have been saved through faith. And this is not your own doing; 
           it is the gift of God, 9 not a result of works, so that no one may boast" (Ephesians 2:8-9, ESV).</i>
        </p>
      </div>
    </div>
        <div class="flex-container">
      <div class="title-container">   
        <h3>
          Promise
        </h3>
      </div>
      <div class="text-container">
        <p>
         <i>" But to all who did receive him, who believed in his name, 
           he gave the right to become children of God" (John 1:12, ESV).</i>
        </p>
      </div>
    </div>
  </div>
    </div>
  

<?php
  displayFooter();
 ?>