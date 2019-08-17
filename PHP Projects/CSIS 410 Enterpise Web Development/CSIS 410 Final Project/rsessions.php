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
    $name = $_SESSION['name'];

    displayHeader("Rate Session");
?>

<div id="wrapper">
  

<?php
  displayMenu($access);
?>
  
<?php
  displayPageHeader("Rate Session");
?>
  
  <div class="rateSessionsBackground">
    <div class="rateCenter">
      <form action='addSessionComment.php' method='post'>
        <p>
          <label for='name'>Name</label>
          <?php echo "<input type='text' name='name' id='name' value='$name'/>"?>
        </p>
        <p>
          Do you feel the Session was a great experience?
        </p>
        <p>
          <input type='radio' name='rating' value='Strong Agree'/>Strongly Agree
          <input type='radio' name='rating' value='Agree'/>Agree
          <input type='radio' name='rating' value='Neutral' checked='checked'/>Neutral
          <input type='radio' name='rating' value='Disagree'/>Disagree
          <input type='radio' name='rating' value='Strongly Disagree'/>Strongly Disagree
        </p>
        <p>
          <label for='text'>Comment:</label>
        </p>
        <p>
          <textarea rows='4' cols='50' name='text' id='text'></textarea>
          <input type='submit' value='Enter Rating' id='ratingSubmit'/>
        </p>
      </form>
    </div>
  </div>
  
<?php
  displayFooter();
?>