<?php 
ob_start;
     error_reporting(0);
    session_start();
    if($_SESSION['access'] == 'admin'){ //verify an admin has signed in
      $access = 'admin';
    }elseif($_SESSION['access'] == 'publisher'){ //verify a publisher  has signed in 
      $access = 'publisher';
    }elseif($_SESSION['access'] =='customer'){ //verify a customer has signed in
      $access = 'customer';
    }
    $invalid = $_SESSION['invalid'];
    $_SESSION = array();
    session_destroy();
    include("templates/template.php");
    include("templates/connection.php");
    displayHeader("Admin");
    ob_flush()
?>

<div id="wrapper">
  

<?php
ob_start;
displayMenu($access);
?>
  
<?php
displayPageHeader("Admin");
?>
  <div id="adminBackground">
  <div id="admin-table-background">
  <table id="userTable">

    
    
    <?php
    $select = "SELECT * FROM Users";
    
    $users = mysqli_query($dbs, $select);
      while($row = mysqli_fetch_array($users)){
         echo "<tr>
                  <td><h2>{$row['UserName']}<h2></td>
                  <td><h2>{$row['Privilege']}<h2></td>
                  <td><form method='post' action='deleteUser.php'>
                  <input type='hidden' name='delete' value = '{$row['ID']}' />
                  <input type='submit' value='Delete'/>
                  </form></td>
                  <td><form method='get' action='updateUser.php'>
                  <input type='hidden' name='update' value = '{$row['ID']}' />
                  <input type='submit' value='Update Authorization'/>
                  </form></td>
               </tr>";
      }  
ob_flush()
 ?>
  </table>
    </div>
        <div id="add">
  <form action="addUser.php" method="post" id='adminForm'>
    <h2><?php if($invalid){echo"Name already taken or password does not match";}else{echo "Add User";}?></h2>
    <p>
     <label for="userType">Select Authorization</label>
     <select name="authorization" id="userType">
         <option value="admin">Administrator</option>
         <option value="publisher">Publisher</option>
         <option value="customer">Customer</option>
     </select>
    </p>
    <p>
     <label for="login">UserName:</label>
     <input type="text" name="name" id="login"/>
    </p>
    <p>
     <label for="password">Password:</label>
     <input type="password" name="passwordOne" id="password"/>
    </p>
    <p>
     <label for="password"> Re-Enter Password:</label>
     <input type="password" name="passwordTwo" id="password"/>
    </p>
    <p>
        <input type="submit" id="login-button" value="Add User"/>
    </p>
  </form>
    </div>
  </div>
  
 
  
  
  
  
  
<?php
 displayFooter();
?>