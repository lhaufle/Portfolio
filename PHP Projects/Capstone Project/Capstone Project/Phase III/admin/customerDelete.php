<?php
include("../template/database.php");
if($_SERVER['REQUEST_METHOD'] =="GET"){
     
      $id = strip_tags($_GET['id']);
            
      deleteCustomer($id);
      
      header('Location: customer.php');
      setcookie('Updated', 'Record updated!', time() + 10);
      exit;
    }
?>