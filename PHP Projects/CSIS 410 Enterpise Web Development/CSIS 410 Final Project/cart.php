
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
    displayHeader("Shopping Cart");
?>

<div id="wrapper">
  

<?php
  displayMenu($access);
?>
  
<?php
  displayPageHeader("Cart");
?>
  
    <div id="cartBackground">
    <div id="cartCenter">
      <h2>
        Your Cart
      </h2>
      <table>
        
      
      <?php
        $select = "SELECT * FROM Cart";
        $r = mysqli_query($dbs, $select);
      
      
        while($row = mysqli_fetch_array($r)){
          $lineItem = $row['qty'] * $row['price'];
          echo " <form action=\"updateCart.php\" method=\"post\">
                 <tr>
                  <td>
                  <p>{$row['name']}</p>
                  </td>
                  <td>
                  <p>Price: {$row['price']}</p>
                  </td>
                <td>
                <p>
                  <label>Quantity</label>
                  <select name=\"amount\">
                    <option value=\"{$row['qty']}\">Selected: {$row['qty']}</option>
                    <option value=\"1\">1</option>
                    <option value=\"2\">2</option>
                    <option value=\"3\">3</option> 
                    <option value=\"4\">4</option>
                  </select>
                </p>
              </td>
                  <td>
                    <p>Total:$ {$row['due']}</p>
                  </td>
                  <td>
                      <input type=\"hidden\" name=\"price\" value=\"{$row['price']}\"/>
                      <input type=\"hidden\" name=\"update\" value=\"true\"/>
                      <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\"/>
                      <input type=\"submit\" value=\"Update Qty\"/>
                   <td>
                    </form>
                     <form action=\"updateCart.php\" method=\"post\">
                     <input type=\"hidden\" name=\"ID\" value=\"{$row['ID']}\"/>
                     <input type=\"submit\" value=\"Delete\"/>
                    </form>
                    </td>
                  </td>
                </tr>";       
        }      
           $getAmount = "SELECT SUM(due) AS in_cart FROM Cart";
           $r = mysqli_query($dbs, $getAmount);
           $line = mysqli_fetch_array($r);
           $inCart = $line['in_cart'];
           //variables for the total
           $TAX = .06;
           $salesTax = $inCart * $TAX;
           $totalDue = $inCart + $salesTax;
          
           echo "<tr>
                    <td>Net Total: $", number_format($inCart, 2),"</td>
                    <td>Sales Tax: $", number_format($salesTax,2), "</td>
                    <td>Total Due: $", number_format($totalDue,2),"</td>
                    <td><form><input type=\"submit\" value=\"Purchase\" /></form></td>
                    <td><form action=\"sessions.php\" method=\"get\"><input type=\"submit\" value=\"Add Session\" /></form></td>
                    <td><form action=\"products.php\" method=\"get\"><input type=\"submit\" value=\"Add Product\" /></form></td>
                  </tr>";
         
      ?>
        

        </table>
      
    </div>
  </div>
  
<?php
  displayFooter();
 ?>