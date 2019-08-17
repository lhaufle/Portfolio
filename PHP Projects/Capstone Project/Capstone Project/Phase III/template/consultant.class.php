<?php
class consultant {
  
  private $ID;
  private $firstName;
  private $lastName;
  private $email;
  private $officeID;
  private $phoneNumber;
  
    function __construct($id){
    $dbc = mysqli_connect();
    $this->ID = $id;
    $sql = "SELECT * from consultant where consultant_id = $id";
    $result = mysqli_query($dbc, $sql);
    
        while($row = mysqli_fetch_array($result)){
        $this->firstName = $row["first_name"];
        $this->lastName = $row["last_name"];
        $this->email = $row["email"];
        $this->phoneNumber = $row["phone_number"];
        $this->officeID = $row["office_id"];
        }
  }
  
  //-------------Getters---------------------------------
  public function getID(){return $this->ID;}
  public function getFirstName(){return $this->firstName;}
  public function getLastName(){return $this->lastName;}
  public function getEmail(){return $this->email;}
  public function getOfficeID(){return $this->officeID;}
  public function getPhoneNumber(){return $this->phoneNumber;}
  
  
}



?>
