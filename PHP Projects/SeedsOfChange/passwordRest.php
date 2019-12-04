<?php
session_start();
include './phpScripts/Data.php';
include './phpScripts/functions.php';

//get id of logged in user
$id = $_SESSION['user_id'];

if($_SESSION['REQUEST_METHOD'] == 'POST'){
  if(!empty($_POST['email'])){
    
    //create connection
    $con = new Data();
    $con = con->connect();
    
    //create select statement
    $select = <<< EOT
    select * from user where user_id = $id;
EOT;
    
    //submit query
    $result = mysqli_query($con, $select);
    
  }
}
