<?php

class customer {
  
  private $ID;
  private $firstName;
  private $lastName;
  private $address;
  private $creditID;
  private $consultantID;
  private $email;
  private $phoneNumber;
 
  
  function __construct($id){
    //takes only the customer ID as the argument then uses a query to set attributes :) the experiment worked!!
    $dbc = mysqli_connect();
    $this->ID = $id;
    $sql = "SELECT * from customer where customer_id = $id";
    $result = mysqli_query($dbc, $sql);
    
     while($row = mysqli_fetch_array($result)){
        $this->firstName = $row["first_name"];
        $this->lastName = $row["last_name"];
        $this->address = $row["address"];
        $this->creditID = $row["credit_id"];
        $this->consultantID = $row["consultant_id"];
        $this->email = $row["email"];
        $this->phoneNumber = $row["phone_number"];
     }
  }
  
  
  //-------------getters----------------------
  public function getFirstName(){
    return $this->firstName;
  }
  
  public function getLastName(){
    return $this->lastName;
  }
  
  public function getAddress(){
    return $this->address;
  }
  
  public function getCreditID(){
    return $this->creditID;
  }
  
 public function getConsultantID(){
    return $this->consultantID;
  }
  
 public function getEmail(){
    return $this->email;
 } 
  
public function getPhoneNumber(){
    return $this->phoneNumber;
 }
  
public function getID(){
    return $this->ID;
 }
  
  
}

?>
