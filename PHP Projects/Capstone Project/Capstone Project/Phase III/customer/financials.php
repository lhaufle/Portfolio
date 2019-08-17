
<?php include("../template/database.php");
 session_start();
 $id = $_SESSION["id"];
?>

<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    //strip possible tags and assign to variables
    $foodSales = strip_tags($_POST['foodSales']);
    $wineSales = strip_tags($_POST['wineSales']);
    $beerSales = strip_tags($_POST['beerSales']);
    $beverageSales = strip_tags($_POST['beverageSales']);
    $cateringSales = strip_tags($_POST['cateringSales']);
    $foodCost = strip_tags($_POST['foodCost']);
    $wineCost = strip_tags($_POST['wineCost']);
    $beerCost = strip_tags($_POST['beerCost']);
    $beverageCost = strip_tags($_POST['beverageCost']);
    $cateringCost = strip_tags($_POST['cateringCost']);
    $laborCost = strip_tags($_POST['laborCost']);
    $miscCost = strip_tags($_POST['miscCost']);
    $rentCost = strip_tags($_POST['rentCost']);
    $utilCost = strip_tags($_POST['utilCost']);
    $propertyTaxCost = strip_tags($_POST['propertyTaxCost']);
    $wasteRemovalCost = strip_tags($_POST['wasteRemovalCost']);
    $insuranceCost = strip_tags($_POST['insuranceCost']);
    $equipmentRepairsCost = strip_tags($_POST['equipmentRepairsCost']);
  
    addFinancials($foodSales, $wineSales, $beerSales, $beverageSales, $cateringSales, $foodCost, $wineCost, $beerCost, $beverageCost, $cateringCost, $laborCost, $miscCost, $rentCost, $utilCost, $propertyTaxCost, $wasteRemovalCost, $insuranceCost, $equipmentRepairsCost, $id);
 
  }
?>


<?php include("../template/template.php"); ?>

<?php
  displayHeader("Financial Portal");
?>

<div class="container">
  
  
 <!-- NavBar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sysco Consulting</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="financials.php">Financials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="menu.php">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="message.php">Message</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
  
<?php
  displayJumbo("Financials", "Enter your weekly profit and loss information");
?> 
  
  <!--Profit and Loss form-->
<form action="financials.php" method="POST">

<!--food sales-->
  <div class="form-group">
    <h3>Sales</h3>
	<hr/>
    <label for="foodSales">Food Sales</label>
    <input type="text" class="form-control" id="foodSales" name="foodSales" placeholder="Enter food sales">
     </div>

<!--wine sales-->
  <div class="form-group">
    <label for="wineSales">Wine Sales</label>
    <input type="text" class="form-control"  name="wineSales" id="wineSales" placeholder="Enter wine sales">
  </div>

<!--beer sales-->
<div class="form-group">
    <label for="beerSales">Beer Sales</label>
    <input type="text" class="form-control"  name="beerSales" id="beerSales" placeholder="Enter beer sales">
  </div>

<!--beverage sales-->
<div class="form-group">
    <label for="beverageSales">Beverage Sales</label>
    <input type="text" class="form-control"  name="beverageSales" id="beverageSales" placeholder="Enter beverage sales">
  </div>

<!--catering sales-->
<div class="form-group">
    <label for="cateringSales">Catering Sales</label>
    <input type="text" class="form-control"  name="cateringSales" id="cateringSales" placeholder="Enter catering sales">
  </div>

<!--Cost of Goods Sold-->
<!--food cost-->
  <div class="form-group">
    <h3>Cost of Goods Sold</h3>
	<hr/>
    <label for="foodCost">Food Cost</label>
    <input type="text" class="form-control" id="foodCost" name="foodCost" placeholder="Enter food cost">
     </div>

<!--wine cost-->
  <div class="form-group">
    <label for="wineCost">Wine Cost</label>
    <input type="text" class="form-control"  name="wineCost" id="wineCost" placeholder="Enter wine cost">
  </div>

<!--beer cost-->
<div class="form-group">
    <label for="beerCost">Beer Cost</label>
    <input type="text" class="form-control"  name="beerCost" id="beerCost" placeholder="Enter beer Cost">
  </div>

<!--beverage cost-->
<div class="form-group">
    <label for="beverageCost">Beverage Cost</label>
    <input type="text" class="form-control"  name="beverageCost" id="beverageCost" placeholder="Enter beverage cost">
  </div>

<!--catering cost-->
<div class="form-group">
    <label for="cateringCost">Catering Cost</label>
    <input type="text" class="form-control"  name="cateringCost" id="cateringCost" placeholder="Enter catering cost">
  </div>

<!--Cost of labor-->
<!--labor cost-->
  <div class="form-group">
    <h3>Cost of Labor</h3>
	<hr/>
    <label for="laborCost">Labor Cost</label>
    <input type="text" class="form-control" id="laborCost" name="laborCost" placeholder="Enter labor cost">
     </div>

<!--Operating Cost-->
<!--Miscellaneous cost-->
  <div class="form-group">
    <h3>Cost of Operating</h3>
	<hr/>
    <label for="miscCost">Miscellaneous Cost</label>
    <input type="text" class="form-control" id="miscCost" name="miscCost" placeholder="Enter miscellaneous cost">
     </div>

<!--rent cost-->
<div class="form-group">
    <label for="rentCost">Rent Cost</label>
    <input type="text" class="form-control" id="rentCost" name="rentCost" placeholder="Enter rent cost">
     </div>

<!--utilities cost-->
<div class="form-group">
<label for="utilCost">utilities Cost</label>
    <input type="text" class="form-control" id="utilCost" name="utilCost" placeholder="Enter utilities cost">
     </div>

<!--property tax cost-->
<div class="form-group">
<label for="propertyTaxCost">Property Tax Cost</label>
    <input type="text" class="form-control" id="propertyTaxCost" name="propertyTaxCost" placeholder="Enter property tax cost">
     </div>

<!--waste removal cost-->
<div class="form-group">
<label for="wasteRemovalCost">Waste Removal Cost</label>
    <input type="text" class="form-control" id="wasteRemovalCost" name="wasteRemovalCost" placeholder="Enter waste removal cost">
     </div>

<!--insurance cost-->
<div class="form-group">
<label for="insuranceCost">Insurance Cost</label>
    <input type="text" class="form-control" id="insuranceCost" name="insuranceCost" placeholder="Enter insurance cost">
     </div>

<!--equipment repairs cost-->
<div class="form-group">
<label for="equipmentRepairsCost">Equipment Repairs Cost</label>
    <input type="text" class="form-control" id="equipmentRepairsCost" name="equipmentRepairsCost" placeholder="Enter equipment repair cost">
     </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  

<?php
  displayFooter();
?>