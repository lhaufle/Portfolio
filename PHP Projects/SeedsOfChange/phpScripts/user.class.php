<?php

class User {
  private $user_id;
  private $first_name;
  private $last_name;
  private $email;
  
  function __construct($id){
    //connect to database
    $dbc = mysqli_connect('localhost', 'lhaufle', 'batman', 'SeedsOfChange');
    //set the user_id
    $this->user_id = $id;
    //create query statement with the 
    $sql = "SELECT * from user where user_id = $id";
    
    $result = mysqli_query($dbc, $sql);
    
    //initalize the properties
    while($row = mysqli_fetch_array($result)){
      $this->first_name = $row['first_name'];
      $this->last_name = $row['last_name'];
      $this->email = $row['email'];
    }
    
  }
  
  //setters
  function get_user_id(){
    return $this->user_id;
  }
  
  function get_first_name(){
    return $this->first_name;
  }
  
  function get_last_name(){
    return $this->last_name;
  }
  
  function get_email(){
    return $this->email;
  }
  
}
