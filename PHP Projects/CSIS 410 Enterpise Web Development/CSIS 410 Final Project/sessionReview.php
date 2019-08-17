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
    displayHeader("Session Review");
    include("templates/connection.php");
    $privilege = $_SESSION['access'];
?>

<div id="wrapper">
  

<?php
  displayMenu($access);
?>
  
<?php
  displayPageHeader("Session Review");
?>
 <div class='sessionContainer'>
<?php
$select = 'SELECT * FROM SessionComments';
$r = mysqli_query($dbs, $select);
if($privilege == 'admin' || $privilege == 'publisher') { //admins and publishers both have access to remove comments
while($row = mysqli_fetch_array($r)){
  echo "
          <div class='sessionComments'>
           <p>Date: {$row['TimeAccess']} </p>
           <p>Name:{$row['name']}</p>
           <p>Session was satisfactory:{$row['rating']}</p>
           <p>Comments</p>
           <p>{$row['comments']}</p>
           <hr/>
           <p>
           <form action=\"changeProdReview.php\" method=\"post\">
           <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/>
           <input type=\"hidden\" name=\"delete\" value=\"delete\"/>
           <input type=\"submit\" value=\"Delete\"/>
           </form>          
           <p>
           </div>";
}
} else{ //customers and non customers can only view comments
  while($row = mysqli_fetch_array($r)){
    echo "
          <div class='sessionComments'>
           <p>Date: {$row['TimeAccess']} </p>
           <p>Name:{$row['name']}</p>
           <p>Product was satisfactory:{$row['rating']}</p>
           <p>Comments</p>
           <p>{$row['comments']}</p>
           <hr/>
           </div>";
  }
} 


  
      
?>
  </div>

<?php
  displayFooter();
 ?>