<?php 
  //  error_reporting(0);
    session_start();
    if($_SESSION['access'] == 'admin'){ //verify an admin has signed in
      $access = 'admin';
    }elseif($_SESSION['access'] == 'publisher'){ //verify a publisher  has signed in 
      $access = 'publisher';
    }elseif($_SESSION['access'] =='customer'){ //verify a customer has signed in
      $access = 'customer';
    }
    include("templates/connection.php");
    include("templates/template.php");
  displayHeader("Home");
    
    //get data to work with
    $select = "SELECT * FROM HomePage";
    $r = mysqli_query($dbs, $select);
    

    if($access == 'admin'){
      //allow add modify and delete if access level is admin
      $admin = TRUE;
    }elseif($access == 'publisher'){
      //allow modify and add if access level is publisher
      $publisher = TRUE;
    }else{
      //no privileges
      $customer = TRUE;
    }
?>

<div id="wrapper">
  

<?php
displayMenu($access);
?>
  
<?php
displayPageHeader("Little Hauflings");
?>
  
  <div id="homeBackground">
      <div id="innerHome">
        
  <?php
    if($admin){
      
      while($row = mysqli_fetch_array($r)){
        echo "<h2>{$row['header']}</h2>
              <p>{$row['body']}</p>
              <p>ID: {$row['ID']}</p>";  
        
            echo "<form id=\"homeText\" action=\"homeChange.php\" method=\"get\" >
                <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/>
                <input type=\"hidden\" name=\"adjustment\" value=\"delete\"/>
                <input type=\"submit\" value=\"Delete\"/>
              </form>
              <form id=\"homeText\" action=\"homeChange.php\" method=\"get\">
                <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/>
                <input type=\"hidden\" name=\"adjustment\" value=\"modify\"/>
                <input type=\"submit\" value=\"Modify\"/>
              </form>
              <form id=\"homeText\" action=\"homeChange.php\" method=\"get\">
                <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/>
                <input type=\"hidden\" name=\"adjustment\" value=\"add\"/>
                <input type=\"submit\" value=\"Add\"/>
              </form></hr>
              ";
      }
      }elseif($publisher){
       while($row = mysqli_fetch_array($r)){
        echo "<h2>{$row['header']}</h2>
              <p>{$row['body']}</p>
              <p>ID: {$row['ID']}</p>"; 
                 echo "<form id=\"homeText\" action=\"homeChange.php\" method=\"get\" >
                <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/>
                <input type=\"hidden\" name=\"adjustment\" value=\"delete\"/>
                <input type=\"submit\" value=\"Delete\"/>
              </form>
              <form id=\"homeText\" action=\"homeChange.php\" method=\"get\">
                <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/>
                <input type=\"hidden\" name=\"adjustment\" value=\"modify\"/>
                <input type=\"submit\" value=\"Modify\"/>
              </form>";
    }
    }else{
      while($row = mysqli_fetch_array($r)){
      echo "<h2>{$row['header']}</h2>
              <p>{$row['body']}</p>
              <p>ID: {$row['ID']}</p>";
    }}
  ?>
        </div>
  </div>

  
<?php
  displayFooter();
 ?>