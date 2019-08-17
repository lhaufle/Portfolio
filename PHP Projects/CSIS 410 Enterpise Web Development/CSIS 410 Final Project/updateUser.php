<?php 
   //error_reporting(0);
    session_start();
    include("templates/template.php");
    include("templates/connection.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //verify requst came via post
    $showForm = FALSE; //do not show the form
    $userID = $_POST['UserID'];
    $authorization = $_POST['authorization'];
    $query = "UPDATE Users SET Privilege = '$authorization' WHERE ID = $userID"; //query to update username
    $r = mysqli_query($dbs, $query); 
    echo "<script> window.location.href = 'admin.php'</script>";
    } elseif($_SERVER['REQUEST_METHOD'] == 'GET') {
      $id = $_GET['update'];
      $select = "SELECT * FROM Users WHERE ID = $id";
      $user = mysqli_query($dbs, $select);
      $row = mysqli_fetch_array($user);
      $outPut = "<form action='updateUser.php' method='post' id='adminForm'>
     <label for='userType'>Updated Authorization</label>
     <select name='authorization' id='userType'>
         <option value='admin'>Administrator</option>
         <option value='publisher'>Publisher</option>
         <option value='customer'>Customer</option>
      </select>
      <p>
     <label for='login'>UserName:</label>
     <input type='text' name='name' id='login' value='{$row['UserName']}'/>
     <input type='hidden' name='UserID' value='{$row['ID']}'>
    </p>
     <input type='submit' id='login-button' value='Update'/>
    </p>
      </form>";
     $showForm = True;
    }
?>

<?php
  //display the form if post request not detected
  if($showForm){
    echo $outPut;
  }

?>


<?php
 displayFooter();
?>