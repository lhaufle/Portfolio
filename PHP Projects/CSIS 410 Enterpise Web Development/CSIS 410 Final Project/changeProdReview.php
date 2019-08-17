<?php 
    ini_set('display_errors', 0);
    session_start();
    include("templates/connection.php");
    $id = $_POST['id'];
    $update = FALSE;
    if(isset($_POST['delete'])){
      $delete = "DELETE FROM ProductComments WHERE ID = $id";
      mysqli_query($dbs, $delete);
      header("Location:productReview.php");
    }elseif(isset($_POST['update'])){
      $update = TRUE;
    }
?>

<?php
   if($update) {
      echo "  <form action=\"changeProdReview\" method=\"get\">
                <p>
                 UserName:<input type=\"text\" name=\"name\" value=\"{$_SESSION['name']}\"\/>
                </p>
                <p>
                <textarea rows=\"4\" cols=\"50\" name=\"text\" value=\"update\" id=\"text\"></textarea>
                <input type=\"hidden\" name=\"id\" value=\"$id\"/>
                <input type=\"submit\" value=\"update\"/>
                </p>
              </form>     
            ";
   }  
 ?>