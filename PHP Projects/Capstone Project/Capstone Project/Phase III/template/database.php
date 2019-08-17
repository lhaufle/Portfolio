<?php
   include("../template/finance.class.php");
   include("../template/customer.class.php"); 
   include("../template/credit.class.php");
   include("../template/consultant.class.php");
   $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
?>

<!-------------------------------------------------------MENU--------------------------------------------------------------->

<?php
    function displayMenu($idNumber){
     $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
    //displayMenu takes the id number as an argument and queries menu items
     $sql = "SELECT * from menu where location_id = $idNumber";
     $result = mysqli_query($dbc, $sql);

    //loop through the results and display them no the page
     while($row = mysqli_fetch_array($result)){
      	echo "<div class=\"col\">
        <div class=\"card\">
  <div class=\"card-header\">
    {$row['name']}
  </div>
  <div class=\"card-body\">
    <blockquote class=\"blockquote mb-0\">
      <p>{$row['description']}</p>
      <footer class=\"blockquote-footer\">Cost to Make: $ {$row['cost_to_produce']}  Sale Price: $ {$row['sale_price']} <cite title=\"Source Title\"></cite> 
        <form action=\"menu.php\" method=\"GET\"><button type=\"submit\" name=\"delete\" value=\"{$row['item_id']}\" class=\"btn btn-primary btn-sm\">Delete</button></form>
        </footer>
    </blockquote>
  </div>
</div>
</div> <br/>";
    } 
  } 
?>

<?php
     // take the id number of the menu item and deletes from the table
    function deleteMenu($idNumber){
      $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
      
      $sql = "DELETE from menu where item_id = $idNumber";
      
      $result = mysqli_query($dbc, $sql);
      
    }
?>

<?php
  //takes the input from the form and adds it to the menu database
  function addMenuItem($idNumber, $name, $describe, $cost, $price ){
    $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
    $sql = "insert into menu(name, description, cost_to_produce, sale_price, location_id) values (\"$name\", \"$describe\", $cost, $price, $idNumber)";
    mysqli_query($dbc, $sql);
  }
?>


<!--------------------------------------------------------------------------END MENU-------------------------------------------------------------------------->


<!---------------------------------------------------------------------------Financials Entry----------------------------------------------------------------------->

<?php

  //function takes the information from the form and enters the input into the financials table
  function addFinancials($food_sales, $wine_sales, $beer_sales, $beverage_sales, $catering_sales, $food_cost, $wine_cost, $beer_cost, $beverage_cost, $catering_cost, $labor_cost, $misc_cost, $rent_cost, $utilites_cost, $propertyTax_cost, $waste_removal_cost, $insurance_cost, $equipment_cost, $location_id){
    $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
    
    $sql = "insert into profit_loss(food_sales, wine_sales, beer_sales, beverage_sales, catering_sales, food_cost, wine_cost, beer_cost, beverage_cost, catering_cost, labor_cost, misc_cost, rent_cost, ulilities_cost, propertyTax_cost, waste_removal_cost, insurance_cost, equipment_cost, location_id) 
    values($food_sales, $wine_sales, $beer_sales, $beverage_sales, $catering_sales, $food_cost, $wine_sales, $beer_sales, $beverage_sales, $catering_cost, $labor_cost, $misc_cost, $rent_cost, $utilites_cost, $propertyTax_cost, $waste_removal_cost, $insurance_cost, $equipment_cost,1)";
    
    mysqli_query($dbc, $sql);
    
    echo "<script> location.href = 'home.php' </script>";
  }
 ?>

<!--------------------------------------------------------------------END FINANCIAL ENTRY------------------------------END


<!----------------------------------------------------Financials On Home Page-----------------------------------> 

<?php
    //displays the gross and net totals for the week for each entry
    function showFinancials($idNumber){
      
      $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
      
     $sql = "SELECT * from profit_loss 
     profit_loss INNER JOIN customer_location ON profit_loss.location_id = customer_location.location_id 
     where customer_location.location_id = $idNumber 
     ORDER BY profit_loss.entry_date";
      
       $result = mysqli_query($dbc, $sql);
      
      while($row = mysqli_fetch_array($result)){
        $entry = new PLcalculator($row['food_sales'], $row['wine_sales'], $row['beer_sales'], $row['beverage_sales'], $row['catering_sales'], $row['food_cost'], $row['wine_cost'], $row['beer_cost'], $row['beverage_cost'], $row['catering_cost'], $row['labor_cost'], $row['misc_cost'], $row['rent_cost'], $row['ulilities_cost'], $row['propertyTax_cost'], $row['waste_removal_cost'], $row['insurance_cost'], $row['equipment_cost'], $row['entry_date'], $row['id'] );
        echo $entry;
      }
      
    }
?>

<?php
      function viewFinancials($id){
         $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
         $sql = "select * from profit_loss where id = $id";
         $result = mysqli_query($dbc, $sql);
         while($row = mysqli_fetch_array($result)){
         $entry = new PLcalculator($row['food_sales'], $row['wine_sales'], $row['beer_sales'], $row['beverage_sales'], $row['catering_sales'], $row['food_cost'], $row['wine_cost'], $row['beer_cost'], $row['beverage_cost'], $row['catering_cost'], $row['labor_cost'], $row['misc_cost'], $row['rent_cost'], $row['ulilities_cost'], $row['propertyTax_cost'], $row['waste_removal_cost'], $row['insurance_cost'], $row['equipment_cost'], $row['entry_date'], $row['id'] );
         
           
   echo  "
<form action=\"viewFinancials.php\" method=\"GET\">

<!--food sales-->
  <div class=\"form-group\">
    <h3>Sales</h3>
	<hr/>
    <label for=\"foodSales\">Food Sales</label>
    <input type=\"text\" class=\"form-control\" id=\"foodSales\" name=\"foodSales\" placeholder=\"Enter food sales\" value=\"{$entry->getFoodSales()}\">
     </div>

<!--wine sales-->
  <div class=\"form-group\">
    <label for=\"wineSales\">Wine Sales</label>
    <input type=\"text\" class=\"form-control\"  name=\"wineSales\" id=\"wineSales\" placeholder=\"Enter wine sales\" value=\"{$entry->getWineSales()}\">
  </div>

<!--beer sales-->
<div class=\"form-group\">
    <label for=\"beerSales\">Beer Sales</label>
    <input type=\"text\" class=\"form-control\"  name=\"beerSales\" id=\"beerSales\" placeholder=\"Enter beer sales\" value=\"{$entry->getBeerSales()}\">
  </div>

<!--beverage sales-->
<div class=\"form-group\">
    <label for=\"beverageSales\">Beverage Sales</label>
    <input type=\"text\" class=\"form-control\"  name=\"beverageSales\" id=\"beverageSales\" placeholder=\"Enter beverage sales\" value=\"{$entry->getBeverageSales()}\">
  </div>

<!--catering sales-->
<div class=\"form-group\">
    <label for=\"cateringSales\">Catering Sales</label>
    <input type=\"text\" class=\"form-control\"  name=\"cateringSales\" id=\"cateringSales\" placeholder=\"Enter catering sales\" value=\"{$entry->getCateringSales()}\">
  </div>

<!--Cost of Goods Sold-->
<!--food cost-->
  <div class=\"form-group\">
    <h3>Cost of Goods Sold</h3>
	<hr/>
    <label for=\"foodCost\">Food Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"foodCost\" name=\"foodCost\" placeholder=\"Enter food cost\" value=\"{$entry->getFoodCost()}\">
     </div>

<!--wine cost-->
  <div class=\"form-group\">
    <label for=\"wineCost\">Wine Cost</label>
    <input type=\"text\" class=\"form-control\"  name=\"wineCost\" id=\"wineCost\" placeholder=\"Enter wine cost\" value=\"{$entry->getWineCost()}\">
  </div>

<!--beer cost-->
<div class=\"form-group\">
    <label for=\"beerCost\">Beer Cost</label>
    <input type=\"text\" class=\"form-control\"  name=\"beerCost\" id=\"beerCost\" placeholder=\"Enter beer Cost\" value=\"{$entry->getBeerCost()}\">
  </div>

<!--beverage cost-->
<div class=\"form-group\">
    <label for=\"beverageCost\">Beverage Cost</label>
    <input type=\"text\" class=\"form-control\"  name=\"beverageCost\" id=\"beverageCost\" placeholder=\"Enter beverage cost\" value=\"{$entry->getBeverageCost()}\">
  </div>

<!--catering cost-->
<div class=\"form-group\">
    <label for=\"cateringCost\">Catering Cost</label>
    <input type=\"text\" class=\"form-control\"  name=\"cateringCost\" id=\"cateringCost\" placeholder=\"Enter catering cost\" value=\"{$entry->getCateringCost()}\">
  </div>

<!--Cost of labor-->
<!--labor cost-->
  <div class=\"form-group\">
    <h3>Cost of Labor</h3>
	<hr/>
    <label for=\"laborCost\">Labor Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"laborCost\" name=\"laborCost\" placeholder=\"Enter labor cost\" value=\"{$entry->getLaborCost()}\">
     </div>

<!--Operating Cost-->
<!--Miscellaneous cost-->
  <div class=\"form-group\">
    <h3>Cost of Operating</h3>
	<hr/>
    <label for=\"miscCost\">Miscellaneous Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"miscCost\" name=\"miscCost\" placeholder=\"Enter miscellaneous cost\" value=\"{$entry->getMiscCost()}\">
     </div>

<!--rent cost-->
<div class=\"form-group\">
    <label for=\"rentCost\">Rent Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"rentCost\" name=\"rentCost\" placeholder=\"Enter rent cost\" value=\"{$entry->getRentCost()}\">
     </div>

<!--utilities cost-->
<div class=\"form-group\">
<label for=\"utilCost\">utilities Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"utilCost\" name=\"utilCost\" placeholder=\"Enter utilities cost\" value=\"{$entry->getUtilCost()}\">
     </div>

<!--property tax cost-->
<div class=\"form-group\">
<label for=\"propertyTaxCost\">Property Tax Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"propertyTaxCost\" name=\"propertyTaxCost\" placeholder=\"Enter property tax cost\" value=\"{$entry->getPropertyTaxCost()}\">
     </div>

<!--waste removal cost-->
<div class=\"form-group\">
<label for=\"wasteRemovalCost\">Waste Removal Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"wasteRemovalCost\" name=\"wasteRemovalCost\" placeholder=\"Enter waste removal cost\" value=\"{$entry->getWasteRemovalCost()}\">
     </div>

<!--insurance cost-->
<div class=\"form-group\">
<label for=\"insuranceCost\">Insurance Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"insuranceCost\" name=\"insuranceCost\" placeholder=\"Enter insurance cost\" value=\"{$entry->getInsuranceCost()}\">
     </div>

<!--equipment repairs cost-->
<div class=\"form-group\">
<label for=\"equipmentRepairsCost\">Equipment Repairs Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"equipmentRepairsCost\" name=\"equipmentRepairsCost\" placeholder=\"Enter equipment repair cost\" value=\"{$entry->getEquipmentRepairsCost()}\">
     </div>
  <button type=\"submit\" class=\"btn btn-primary\" id=\"update\" name=\"updated\" value=\"{$entry->getID()}\">Update</button> <form action=\"home.php\"><button type=\"submit\" class=\"btn btn-primary\">Back</button> </form>
</form>";
              
           
      }
  }

?>

<!---------------------------------------------------END HOME PAGE--------------------------------->

<!--------------------------------------------------Message Page------------------------------------>

<?php
    function showMessage($customerID){
      
      $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
      
      $sql = "select message.message, consultant.first_name, consultant.last_name, message.message_date, message.sender
      from message INNER JOIN consultant on message.consultant_id = consultant.consultant_id
      where customer_id = $customerID ORDER BY message_date DESC";
      
      $result = mysqli_query($dbc, $sql);
      
      while($row = mysqli_fetch_array($result)){
               	echo "<div class=\"card\">
             <div class=\"card-header\">
             Sent By: {$row['sender']}
             </div>
            <div class=\"card-body\">
               <blockquote class=\"blockquote mb-0\">
                  <p>{$row['message']}</p>
                  <footer class=\"blockquote-footer\">{$row['message_date']}<cite title=\"Source Title\"></cite></footer>
              </blockquote>
           </div>
        </div> </br>";
      }
      
    }
?>

<?php
    function sendMessage($custID, $consID, $mess, $sent){
      $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
      $sql = "insert into message(customer_id, consultant_id, message, sender) values($custID, $consID, \"$mess\", \"$sent\")";
      $result = mysqli_query($dbc, $sql);
    }
?>

<!------------------------------END MESSAGE PAGE------------------------------------>

<!------------------------------Credit Home Page----------------------------------->

<?php
   /*
   The selectCustomer function connects to the database selects each customer and 
   passes the id of each customer into a customer object. The objects methods will pass 
   values for the dropdown box
   */
  function selectCustomer($id){
    //make database connection
    $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
    $sql = "select customer.first_name, customer.last_name, customer.address, customer.email, customer.phone_number, customer.customer_id
    from customer INNER JOIN credit on customer.credit_id = credit.credit_id
    where credit.credit_id = {$id} order by customer.last_name";
    
    $result = mysqli_query($dbc, $sql);
    
    while($row = mysqli_fetch_array($result)){
      $customer = new customer($row['customer_id']);
      
      echo "<option value = \" {$customer->getID()} \">{$customer->getFirstName()} {$customer->getLastName()}</option>";
      
    }
  }


?>



<?php
      function viewOnlyFinancials($id){
         $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
         $sql = "select * from profit_loss where id = $id";
         $result = mysqli_query($dbc, $sql);
         while($row = mysqli_fetch_array($result)){
         $entry = new PLcalculator($row['food_sales'], $row['wine_sales'], $row['beer_sales'], $row['beverage_sales'], $row['catering_sales'], $row['food_cost'], $row['wine_cost'], $row['beer_cost'], $row['beverage_cost'], $row['catering_cost'], $row['labor_cost'], $row['misc_cost'], $row['rent_cost'], $row['ulilities_cost'], $row['propertyTax_cost'], $row['waste_removal_cost'], $row['insurance_cost'], $row['equipment_cost'], $row['entry_date'], $row['id'] );
         
   //display a prepopulated financials form
   echo  "

<!--food sales-->
  <div class=\"form-group\">
    <h3>Sales</h3>
	<hr/>
    <label for=\"foodSales\">Food Sales</label>
    <input type=\"text\" class=\"form-control\" id=\"foodSales\" name=\"foodSales\" placeholder=\"Enter food sales\" value=\"{$entry->getFoodSales()}\">
     </div>

<!--wine sales-->
  <div class=\"form-group\">
    <label for=\"wineSales\">Wine Sales</label>
    <input type=\"text\" class=\"form-control\"  name=\"wineSales\" id=\"wineSales\" placeholder=\"Enter wine sales\" value=\"{$entry->getWineSales()}\">
  </div>

<!--beer sales-->
<div class=\"form-group\">
    <label for=\"beerSales\">Beer Sales</label>
    <input type=\"text\" class=\"form-control\"  name=\"beerSales\" id=\"beerSales\" placeholder=\"Enter beer sales\" value=\"{$entry->getBeerSales()}\">
  </div>

<!--beverage sales-->
<div class=\"form-group\">
    <label for=\"beverageSales\">Beverage Sales</label>
    <input type=\"text\" class=\"form-control\"  name=\"beverageSales\" id=\"beverageSales\" placeholder=\"Enter beverage sales\" value=\"{$entry->getBeverageSales()}\">
  </div>

<!--catering sales-->
<div class=\"form-group\">
    <label for=\"cateringSales\">Catering Sales</label>
    <input type=\"text\" class=\"form-control\"  name=\"cateringSales\" id=\"cateringSales\" placeholder=\"Enter catering sales\" value=\"{$entry->getCateringSales()}\">
  </div>

<!--Cost of Goods Sold-->
<!--food cost-->
  <div class=\"form-group\">
    <h3>Cost of Goods Sold</h3>
	<hr/>
    <label for=\"foodCost\">Food Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"foodCost\" name=\"foodCost\" placeholder=\"Enter food cost\" value=\"{$entry->getFoodCost()}\">
     </div>

<!--wine cost-->
  <div class=\"form-group\">
    <label for=\"wineCost\">Wine Cost</label>
    <input type=\"text\" class=\"form-control\"  name=\"wineCost\" id=\"wineCost\" placeholder=\"Enter wine cost\" value=\"{$entry->getWineCost()}\">
  </div>

<!--beer cost-->
<div class=\"form-group\">
    <label for=\"beerCost\">Beer Cost</label>
    <input type=\"text\" class=\"form-control\"  name=\"beerCost\" id=\"beerCost\" placeholder=\"Enter beer Cost\" value=\"{$entry->getBeerCost()}\">
  </div>

<!--beverage cost-->
<div class=\"form-group\">
    <label for=\"beverageCost\">Beverage Cost</label>
    <input type=\"text\" class=\"form-control\"  name=\"beverageCost\" id=\"beverageCost\" placeholder=\"Enter beverage cost\" value=\"{$entry->getBeverageCost()}\">
  </div>

<!--catering cost-->
<div class=\"form-group\">
    <label for=\"cateringCost\">Catering Cost</label>
    <input type=\"text\" class=\"form-control\"  name=\"cateringCost\" id=\"cateringCost\" placeholder=\"Enter catering cost\" value=\"{$entry->getCateringCost()}\">
  </div>

<!--Cost of labor-->
<!--labor cost-->
  <div class=\"form-group\">
    <h3>Cost of Labor</h3>
	<hr/>
    <label for=\"laborCost\">Labor Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"laborCost\" name=\"laborCost\" placeholder=\"Enter labor cost\" value=\"{$entry->getLaborCost()}\">
     </div>

<!--Operating Cost-->
<!--Miscellaneous cost-->
  <div class=\"form-group\">
    <h3>Cost of Operating</h3>
	<hr/>
    <label for=\"miscCost\">Miscellaneous Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"miscCost\" name=\"miscCost\" placeholder=\"Enter miscellaneous cost\" value=\"{$entry->getMiscCost()}\">
     </div>

<!--rent cost-->
<div class=\"form-group\">
    <label for=\"rentCost\">Rent Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"rentCost\" name=\"rentCost\" placeholder=\"Enter rent cost\" value=\"{$entry->getRentCost()}\">
     </div>

<!--utilities cost-->
<div class=\"form-group\">
<label for=\"utilCost\">utilities Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"utilCost\" name=\"utilCost\" placeholder=\"Enter utilities cost\" value=\"{$entry->getUtilCost()}\">
     </div>

<!--property tax cost-->
<div class=\"form-group\">
<label for=\"propertyTaxCost\">Property Tax Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"propertyTaxCost\" name=\"propertyTaxCost\" placeholder=\"Enter property tax cost\" value=\"{$entry->getPropertyTaxCost()}\">
     </div>

<!--waste removal cost-->
<div class=\"form-group\">
<label for=\"wasteRemovalCost\">Waste Removal Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"wasteRemovalCost\" name=\"wasteRemovalCost\" placeholder=\"Enter waste removal cost\" value=\"{$entry->getWasteRemovalCost()}\">
     </div>

<!--insurance cost-->
<div class=\"form-group\">
<label for=\"insuranceCost\">Insurance Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"insuranceCost\" name=\"insuranceCost\" placeholder=\"Enter insurance cost\" value=\"{$entry->getInsuranceCost()}\">
     </div>

<!--equipment repairs cost-->
<div class=\"form-group\">
<label for=\"equipmentRepairsCost\">Equipment Repairs Cost</label>
    <input type=\"text\" class=\"form-control\" id=\"equipmentRepairsCost\" name=\"equipmentRepairsCost\" placeholder=\"Enter equipment repair cost\" value=\"{$entry->getEquipmentRepairsCost()}\">
     </div>
  <form action=\"home.php\"><button type=\"submit\" class=\"btn btn-primary\">Back</button> </form>
";
              
           
      }
  }

?>


<!----------------------------------------Consultant Home Page------------------------------------->

<?php
   /*
   selectCustomerConsultant()
   The selectCustomer function connects to the database selects each customer and 
   passes the id of each customer into a customer object. The objects methods will pass 
   values for the dropdown box
   */
  function selectCustomerConsultant($id){
    //make database connection
    $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
    $sql = "select customer.first_name, customer.last_name, customer.address, customer.email, customer.phone_number, customer.customer_id
    from customer INNER JOIN consultant on consultant.consultant_id = customer.consultant_id
    where consultant.consultant_id = $id order by customer.last_name";
    
    $result = mysqli_query($dbc, $sql);
    
    while($row = mysqli_fetch_array($result)){
      $customer = new customer($row['customer_id']);
      
      echo "<option value = \" {$customer->getID()} \">{$customer->getFirstName()} {$customer->getLastName()}</option>";
      
    }
  }

  /*
  displayCustomerInfo()
  Pass the id into the customer object and use the information to diplay customer 
  information. 
  */
  function diplayCustomerInfo($id) {
    $customer = new customer($id);
    
    echo "<h4>{$customer->getFirstName()} {$customer->getLastName()}</h4>
          <p>Phone Number: {$customer->getPhoneNumber()}</p>
          <p>Email: {$customer->getEmail()}</p>
          <p>Address: {$customer->getAddress()}</p>"; 
  }


?>

<!-----------------Send Message to customer------------------>

<?php
    function showCustomerMessage($consultantID){
      
      $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
      
      $sql = "select DISTINCT message.message, consultant.first_name, consultant.last_name, message.message_date, message.sender from message INNER JOIN consultant on  message.consultant_id = consultant.consultant_id INNER JOIN customer on customer.consultant_id = consultant.consultant_id where consultant.consultant_id = $consultantID ORDER BY message_date DESC ";
      
      $result = mysqli_query($dbc, $sql);
      
      while($row = mysqli_fetch_array($result)){
               	echo "<div class=\"card\">
             <div class=\"card-header\">
             Sent By: {$row['sender']}
             </div>
            <div class=\"card-body\">
               <blockquote class=\"blockquote mb-0\">
                  <p>{$row['message']}</p>
                  <footer class=\"blockquote-footer\">{$row['message_date']}<cite title=\"Source Title\"></cite></footer>
              </blockquote>
           </div>
        </div> </br>";
      }
    }
?>

<?php
    function displayCustomerMenu($customerID){
     $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
    //displayMenu takes the id number as an argument and queries menu items
     $sql = "select *
    from menu INNER JOIN customer_location on menu.location_id = customer_location.location_id
    INNER JOIN customer on customer_location.customer_id = customer.customer_id
    where customer.customer_id = $customerID";
  
     $result = mysqli_query($dbc, $sql);

    //loop through the results and display them no the page
     while($row = mysqli_fetch_array($result)){
      	echo "<div class=\"col\">
        <div class=\"card\">
  <div class=\"card-header\">
    {$row['name']}
  </div>
  <div class=\"card-body\">
    <blockquote class=\"blockquote mb-0\">
      <p>{$row['description']}</p>
      <footer class=\"blockquote-footer\">Cost to Make: $ {$row['cost_to_produce']}  Sale Price: $ {$row['sale_price']} <cite title=\"Source Title\"></cite> 
        </footer>
    </blockquote>
  </div>
</div>
</div> <br/>";
    } 
  } 
?>


<!--------------------------------Code for the Admin's Customer page---------------------->
<?php
/*
 *  Display the list of customers in a dropdown box that are assigned to the
 *  admin
 */
function displayCustomerList($id){
   $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
   $sql = "select * from customer where admin_id = $id";
  
   $result = mysqli_query($dbc, $sql);
  
   while($row = mysqli_fetch_array($result)){
          echo "<option value=\"{$row['customer_id']}\">{$row['last_name']}</option>";
        }
}


?>

<?php
        function displayCredit(){
             $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
             $sql = "select * from credit";
  
             $result = mysqli_query($dbc, $sql);
  
             while($row = mysqli_fetch_array($result)){
                echo "<option value=\"{$row['credit_id']}\">{$row['last_name']}</option>";
               } 
        }

        function displayConsult(){
             $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
             $sql = "select * from consultant";
  
             $result = mysqli_query($dbc, $sql);
  
              while($row = mysqli_fetch_array($result)){
                  echo "<option value=\"{$row['consultant_id']}\">{$row['last_name']}</option>";
               } 
        }

      function addCustomer($firstName, $lastName, $address, $creditID, $consultantID, $email, $phNumber, $admin){
          $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
          $sql = "INSERT INTO customer(`first_name`, `last_name`, `address`, `phone_number`, `email`, `credit_id`, `admin_id`, `consultant_id`) VALUES ('$firstName','$lastName','$address','$phNumber','$email', $creditID, $admin, $consultantID )";
          mysqli_query($dbc, $sql);
      }

    function updateCustomer($firstName, $lastName, $address, $creditID, $consultantID, $email, $phNumber, $admin, $customerID){
      $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
       $sql = "UPDATE customer SET first_name='$firstName',last_name='$lastName',address='$address',phone_number ='$phNumber',email='$email',credit_id=$creditID,admin_id=$admin,consultant_id=$consultantID WHERE customer_id = $customerID";
      mysqli_query($dbc, $sql);
      
    }

 function deleteCustomer($id){
   $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
   $sql = "DELETE FROM `customer`
           where customer_id = $id";
   mysqli_query($dbc, $sql);
 }



    function displayOffice(){
      $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
      $sql = "SELECT * FROM office";
      
      $result = mysqli_query($dbc, $sql);
  
      while($row = mysqli_fetch_array($result)){
         echo "<option value=\"{$row['office_id']}\">{$row['address']}</option>";
      }     
    }


function displayCreditList(){
   $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
   $sql = "select * from credit";
  
   $result = mysqli_query($dbc, $sql);
  
   while($row = mysqli_fetch_array($result)){
          echo "<option value=\"{$row['credit_id']}\">{$row['last_name']}</option>";
        }
}

  function displayConsultantList(){
    $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
   $sql = "select * from consultant";
  
   $result = mysqli_query($dbc, $sql);
  
   while($row = mysqli_fetch_array($result)){
          echo "<option value=\"{$row['consultant_id']}\">{$row['last_name']}</option>";
        }
  }

    function addCredit($firstName, $lastName, $email, $officeID, $phNumber){
       $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
      $sql = "INSERT INTO credit(`first_name`, `last_name`, `phone_number`, `email`, `office_id`) VALUES ('$firstName','$lastName', '$phNumber', '$email', $officeID)";
      mysqli_query($dbc, $sql);
    }

    function updateCredit($firstName, $lastName, $email, $officeID, $phNumber, $id){
       $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
       $sql = "UPDATE credit SET first_name='$firstName',last_name='$lastName',phone_number ='$phNumber',email='$email' WHERE credit_id = $id";
      mysqli_query($dbc, $sql);
    }

  function deleteCredit($id){
   $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
   $sql = "DELETE FROM credit
           where credit_id = $id";
   mysqli_query($dbc, $sql);
    
  }

    function addConsultant($firstName, $lastName, $email, $officeID, $phNumber){
       $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
      $sql = "INSERT INTO consultant(`first_name`, `last_name`, `phone_number`, `email`, `office_id`) VALUES ('$firstName','$lastName', '$phNumber', '$email', $officeID)";
      mysqli_query($dbc, $sql);
      
    }

function updateConsultant($firstName, $lastName, $email, $officeID, $phNumber, $consultantID){
         $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
       $sql = "UPDATE consultant SET first_name='$firstName',last_name='$lastName',phone_number ='$phNumber',email='$email' WHERE consultant_id = $consultantID";
      mysqli_query($dbc, $sql);
  
  
}

function deleteConsultant($id){
   $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
   $sql = "DELETE FROM consultant
           where consultant_id = $id";
   mysqli_query($dbc, $sql);
}

function missingAssignments(){
  $dbc = mysqli_connect('localhost', 'root', 'YourNewPassword', 'sysco');
  $sql = "select * from customer 
          where credit_id IS NULL or consultant_id IS NULL
          order by last_name DESC";
  $results = mysqli_query($dbc, $sql);
  
  while($row = mysqli_fetch_array($results)){
    $customer =  new customer($row['customer_id']);
    
    echo " <div class=\"alert alert-warning\" role=\"alert\">
          Last Name:{$customer->getLastName()} | First Name:{$customer->getFirstName()} |
          Phone Number:{$customer->getPhoneNumber()} | Email:{$customer->getEmail()}
          </div>";
  }
 
}


?>
