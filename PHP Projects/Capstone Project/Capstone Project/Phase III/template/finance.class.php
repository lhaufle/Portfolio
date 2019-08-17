<?php

class PLcalculator {
 
  //private P&L variables for calculations
  private $foodSales;
  private $wineSales;
  private $beerSales;
  private $beverageSales;
  private $cateringSales;
  private $foodCost;
  private $wineCost;
  private $beerCost;
  private $beverageCost;
  private $cateringCost;
  private $laborCost;
  private $miscCost;
  private $rentCost;
  private $utilCost;
  private $propertyTaxCost;
  private $wasteRemovalCost;
  private $insuranceCost;
  private $equipmentRepairsCost;
  private $today;
  private $ID;
  
  //--------------constructor---------------
  function __construct($foodSales, $wineSales, $beerSales, $beverageSales, $cateringSales, $foodCost, $wineCost, $beerCost, $beverageCost, $cateringCost, $laborCost, $miscCost, $rentCost, $utilCost, $propertyTaxCost, $wasteRemovalCost, $insuranceCost, $equipmentRepairsCost, $today, $ID ){
      $this->setFoodSales($foodSales); 
      $this->setWineSales($wineSales);
      $this->setBeerSales($beerSales);
      $this->setBeverageSales($beverageSales);
      $this->setCateringSales($cateringSales);
      $this->setFoodCost($foodCost);
      $this->setWineCost($wineCost);
      $this->setBeerCost($beerCost);
      $this->setBeverageCost($beverageCost);
      $this->setCateringCost($cateringCost);
      $this->setLaborCost($laborCost);
      $this->setMiscCost($miscCost);
      $this->setRentCost($rentCost);
      $this->setUtilCost($utilCost);
      $this->setPropertyTaxCost($propertyTaxCost);
      $this->setWasteRemovalCost($wasteRemovalCost);
      $this->setInsuranceCost($insuranceCost);
      $this->setEquipmentRepairsCost($equipmentRepairsCost);
      $this->setToday($today);
      $this->setID($ID);
  }
  
  //----------------setters-----------------
 
    public function setFoodSales($foodSales){ $this->foodSales = $foodSales;}
  
    public function setWineSales($wineSales){ $this->wineSales = $wineSales;}
  
    public function setBeerSales($beerSales){ $this->beerSales = $beerSales;}
  
    public function setBeverageSales($beverageSales){ $this->beverageSales = $beverageSales;}
  
    public function setCateringSales($cateringSales){ $this->cateringSales = $cateringSales;}
  
    public function setFoodCost($foodCost){ $this->foodCost = $foodCost;}
  
    public function setWineCost($wineCost){ $this->wineCost = $wineCost;}
  
    public function setBeerCost($beerCost){ $this->beerCost = $beerCost;}
  
    public function setBeverageCost($beverageCost){ $this->beverageCost = $beverageCost;}
  
    public function setCateringCost($cateringCost){ $this->cateringCost = $cateringCost;}
  
    public function setLaborCost($laborCost){ $this->laborCost = $laborCost;}
  
    public function setMiscCost($miscCost){ $this->miscCost = $miscCost;}
  
    public function setRentCost($rentCost){ $this->rentCost = $rentCost;}
  
    public function setUtilCost($utilCost){ $this->utilCost = $utilCost;}
  
    public function setPropertyTaxCost($propertyTaxCost){ $this->propertyTaxCost = $propertyTaxCost;}
  
    public function setWasteRemovalCost($wasteRemovalCost){ $this->wasteRemovalCost = $wasteRemovalCost;}
  
    public function setInsuranceCost($insuranceCost){ $this->insuranceCost = $insuranceCost;}
  
    public function setEquipmentRepairsCost($equipmentRepairsCost){ $this->equipmentRepairsCost = $equipmentRepairsCost;}
  
    public function setToday($today){ $this->today = $today;}
  
    public function setID($ID){ $this->ID = $ID;}

  //--------------Getters------------------------
  
  public function getFoodSales() {return $this->foodSales;}
  
  public function getWineSales() {return $this->wineSales;}
    
  public function getBeerSales() {return $this->beerSales;}
    
  public function getBeverageSales() {return $this->beverageSales;}
    
  public function getCateringSales() {return $this->cateringSales;}
    
  public function getFoodCost() {return $this->foodCost;}
     
  public function getWineCost() {return $this->wineCost;}
  
  public function getBeerCost() {return $this->beerCost;}
    
  public function getBeverageCost() {return $this->beverageCost;}
    
  public function getCateringCost() {return $this->cateringCost;}
    
  public function getLaborCost() {return $this->laborCost;}
    
  public function getMiscCost() {return $this->miscCost;}
    
  public function getRentCost() {return $this->rentCost;}
    
  public function getUtilCost() {return $this->utilCost;}
    
  public function getPropertyTaxCost() {return $this->propertyTaxCost;}
    
  public function getWasteRemovalCost() {return $this->wasteRemovalCost;}
    
  public function getInsuranceCost() {return $this->insuranceCost;}
     
  public function getEquipmentRepairsCost() {return $this->equipmentRepairsCost;}
    
  public function getToday() {return $this->today;}
    
  public function getID() {return $this->ID;}
  
  //------------------Public Methods----------------------------
  
  //-------Returns Gross Income
  public function getGross(){
      $grossIncome = $this->getFoodSales() + $this->getWineSales() + $this->getBeerSales() + $this->getBeverageSales() + $this->getCateringSales(); 
      return $grossIncome; 
  }
  
  //-------Returns Net Income
  public function getNet() {
    $netIncome = $this->getGross() - ($this->getFoodCost() + $this->getWineCost() + $this->getBeerCost() + $this->getBeerCost() + $this->getCateringCost() + $this->getLaborCost() + $this->getMiscCost() + $this->getUtilCost() + $this->getPropertyTaxCost() + $this->getWasteRemovalCost() + $this->getInsuranceCost() + $this->getEquipmentRepairsCost()) ;
    return $netIncome;
  }
  
  //---display the card based on input
  public function __toString(){
    return "  <div class=\"card\">
    <div class=\"card-body\">
      <h5 class=\"card-title\"></h5>
      <p class=\"card-text\">Gross Profit: " . $this->getGross(). "<br> Net Profit: ". $this->getNet(). " <br></p>
      <p class=\"card-text\"><small class=\"text-muted\"> Entry Date: ". $this->getToday(). "<form action=\"viewFinancials.php\" method=\"POST\"> <button type =\"submit\" name=\"id\" value=".$this->getID().">View</button></form></small></p>
    </div>
  </div>";
  }
  
}



 ?>