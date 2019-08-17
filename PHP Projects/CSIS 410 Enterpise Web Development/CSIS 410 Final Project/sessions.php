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
    include("templates/connection.php");
    displayHeader("Sessions");
?>

<div id="wrapper">
  

<?php
  displayMenu($access);
?>
  
<?php
  displayPageHeader("Session");
?>
  
  <div id="productBackground">
  <div id="product-table-background">
    <form action="tracking.php" method="post">
      <table>
        
            
<?php
  //connect to the database
        
  $select = "SELECT * FROM Items WHERE type = 'session'"; //query script to get all product items
  $items = mysqli_query($dbs, $select); //submit query 
  
   //notify use if items are in the cart
   $getAmount = "SELECT SUM(qty) AS in_cart FROM Cart";
   $r = mysqli_query($dbs, $getAmount);
   $line = mysqli_fetch_array($r);
   $inCart = $line['in_cart'];
   $checkOut = FALSE;
   if($inCart > 0){
     $checkOut = TRUE;
   }  
        
        
        
        
  while($row = mysqli_fetch_array($items)){ //loop through product items to create table. 

    echo "<form action=\"tracking.php\" method=\"post\">
          <tr>
            <td>
                <img src=\"{$row['img']}\" alt=\"{$row['name']}\"/>
            </td>
             <td>
                <p>
                  {$row['name']}
               </p>
              </td>
              <td>
                <p>
                  {$row['price']}
                  <input type=\"hidden\" name=\"price\" value=\"{$row['price']}\" />
                </p>
              </td>
          <td>
                <p>
                  <label>Qty</label>
                  <select name=\"amount\">
                    <option value=\"1\">1</option>
                    <option value=\"2\">2</option>
                    <option value=\"3\">3</option>
                    <option value=\"4\">4</option> 
                  </select>
                </p>
              </td>
                  <td>
                    <p>
                      <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/>
                      <input type=\"hidden\" name=\"location\" value=\"product\"/>
                      <input type=\"Submit\" value=\"Add To Cart\"/>
                    </p>
                  </td>
        </tr>
        </form>
        ";
  }
        if($checkOut == TRUE){
          echo "<tr>
                  <td colspan=\"4\">
                    <p>". $inCart. " Item(s) have been added to the cart</p>
                  </td>
                  <td>
                    <form action=\"cart.php\" method=\"get\">
                    <input type=\"submit\" value=\"Check Out\"/>
                    </form>
                  </td>
                </tr>";
        }
 ?>

        
      </table>
    </form>
  </div>
</div>
  
<?php
  displayFooter();
 ?>