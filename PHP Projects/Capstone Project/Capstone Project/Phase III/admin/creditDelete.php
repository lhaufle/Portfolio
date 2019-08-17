<?php
include("../template/database.php");
if($_SERVER['REQUEST_METHOD'] =="GET"){
     
      $id = strip_tags($_GET['creditID']);
            
      deleteCredit($id);
      
      header('Location: credit.php');
      setcookie('Updated', 'Record updated!', time() + 10);
      exit;
    }
?>