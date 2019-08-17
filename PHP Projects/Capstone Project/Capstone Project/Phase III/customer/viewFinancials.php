<?php
ini_set( "display_errors", 0);
include("../template/database.php");
include("../template/template.php");

$id = $_POST['id']; //get id that was passed to make sure proper row is selected

if($_SERVER['REQUEST_METHOD'] == "GET"){
  
  $updateID = $_GET['updated']; //get id of row to update
  
  //stip all the tags of possible html
  $foodSales = strip_tags($_GET['foodSales']);
  $wineSales = strip_tags($_GET['wineSales']);
  $beerSales = strip_tags($_GET['beerSales']);
  $beverageSales = strip_tags($_GET['beverageSales']);
  $cateringSales = strip_tags($_GET['cateringSales']);
  $foodCost = strip_tags($_GET['foodCost']);
  $wineCost = strip_tags($_GET['wineCost']);
  $beerCost = strip_tags($_GET['beerCost']);
  $beverageCost = strip_tags($_GET['beverageCost']);
  $cateringCost = strip_tags($_GET['cateringCost']);
  $laborCost = strip_tags($_GET['laborCost']);
  $miscCost = strip_tags($_GET['miscCost']);
  $rentCost = strip_tags($_GET['rentCost']);
  $utilCost = strip_tags($_GET['utilCost']);
  $propertyTaxCost = strip_tags($_GET['propertyTaxCost']);
  $wasteRemovalCost = strip_tags($_GET['wasteRemovalCost']);
  $insuranceCost = strip_tags($_GET['insuranceCost']);
  $equipmentRepairsCost = strip_tags($_GET['equipmentRepairsCost']);
  
  //select statement to query row to update
  $sql = "UPDATE profit_loss SET food_sales=$foodSales,wine_sales=$wineSales,beer_sales=$beerSales,
  beverage_sales=$beverageSales,catering_sales=$cateringSales,food_cost=$foodCost,wine_cost=$wineCost,
  beer_cost=$beerCost,beverage_cost=$beverageCost,catering_cost=$cateringCost,misc_cost=$miscCost,rent_cost=$rentCost,
  ulilities_cost=$utilCost,propertyTax_cost=$propertyTaxCost,waste_removal_cost=$wasteRemovalCost,insurance_cost=$insuranceCost,
  equipment_cost=$equipmentRepairsCost,labor_cost=$laborCost WHERE id = $updateID";
  
  mysqli_query($dbc, $sql); //submit query
  
 echo"<script> window.location.href=\"home.php\";</script>"; //direct to home page to show update
}


displayHeader("View Financials");
echo "<div class=\"container\">";
displayJumbo("View Financials", "");


viewFinancials($id);
echo "</div>";

displayFooter();

echo "  <script src=\"../scripts/script.js\"></script>";

?>