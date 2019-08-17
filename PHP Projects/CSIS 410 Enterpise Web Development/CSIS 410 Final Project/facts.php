<?php 
     error_reporting(0);
    session_start();
    if($_SESSION['access'] == 'admin'){ //verify an admin has signed in
      $access = 'admin';
    }elseif($_SESSION['access'] == 'publisher'){ //verify a publisher  has signed in 
      $access = 'publisher';
    }elseif($_SESSION['access'] =='customer'){ //verify a customer has signed in
      $access = 'customer';
    }
    include("templates/connection.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //verify if request is post
      if(!empty($_POST['fact']) && !empty($_POST['comment'])){ //validate both fields were filled out
        $fact = strip_tags($_POST['fact']); //remove tags
        $comment = strip_tags($_POST['comment']); //remove tags
        $insert = "INSERT INTO `Facts`(`fact`, `description`) VALUES ('$fact','$comment')";
        mysqli_query($dbs, $insert); 
      } else {
        $error = TRUE;
      }
    }

    include("templates/template.php");
  displayHeader("Facts");
?>

<div id="wrapper">
  

<?php
 displayMenu($access);
?>
  
<?php
displayPageHeader("Facts");
?>
  <div id="factBackground">
    <div class = "factsContainer">

<?php //if the user is the admin the add option should appear
      if($access == 'admin' || $access == 'publisher'){
        if($error == TRUE){
          echo "Please fill out fact and comment fields";
        }
        echo "<form action=\"facts.php\" method=\"post\"/>
        <p>
          <label for=\"fact\">Add Fact:</label>
          <input type=\"text\" name=\"fact\" id=\"fact\"/>
          <label for=\"comment\">Add Comment:</label>
          <input type=\"text\" name=\"comment\" id=\"comment\"/>
          <input type=\"submit\" id=\"login-button\" value=\"Add Fact\"/>
        </p>
              </form>";
      }
?>
    
 <?php
      
      if($access == 'admin'){ //test to see if the user is an admin
      $select = 'SELECT * FROM Facts'; //grab facts from database
      $r = mysqli_query($dbs, $select);
      while($row = mysqli_fetch_array($r)){
        //if user is an admin then they also have the options to delete and update
      echo "<div class=\"flex-container\">
      <div class=\"title-container\"> 
        <h3>
          ID: {$row['ID']} | {$row['fact']}
        </h3>
      </div>
      <div class=\"text-container\">
        <p>
          {$row['description']} <form action=\"deletefact.php\" method=\"post\" id=\"homeText\" > 
          <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/> 
          <input type=\"hidden\" name=\"delete\" value=\"delete\"/>
          <input type=\"submit\" id=\"login-button\" value=\"Delete\"/>
          </form> 
          
          <form action=\"updatefact.php\" method=\"get\" id=\"homeText\" > 
          <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/> 
          <input type=\"submit\" id=\"login-button\" value=\"Update\"/>
          </form>
        </p>
      </div>
    </div> ";
      } 
      }elseif($access = 'publisher'){ //display only add and update for the publisher
        $select = 'SELECT * FROM Facts'; //grab facts from database
        $r = mysqli_query($dbs, $select);
      while($row = mysqli_fetch_array($r)){
      echo "<div class=\"flex-container\">
          <div class=\"title-container\"> 
           <h3>
             ID: {$row['ID']} | {$row['fact']}
             </h3>
            </div>
           <div class=\"text-container\">
           <p>
              {$row['description']}    <form action=\"updatefact.php\" method=\"get\" id=\"homeText\" > 
          <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/> 
          <input type=\"submit\" id=\"login-button\" value=\"Update\"/>
          </form>
        </p>
      </div>
    </div> ";
        
         }
      } else { // what everyone else will see
        $select = 'SELECT * FROM Facts'; //grab facts from database
        $r = mysqli_query($dbs, $select);
      while($row = mysqli_fetch_array($r)){
      echo "<div class=\"flex-container\">
          <div class=\"title-container\"> 
           <h3>
             ID: {$row['ID']} | {$row['fact']}
             </h3>
            </div>
           <div class=\"text-container\">
           <p>
              {$row['description']} 
               </p>
      </div>
    </div> ";
      }

      }
?>
  </div>
    </div>
  
<?php
  displayFooter();
 ?>