<?php
include("../template/database.php");
if($_SERVER['REQUEST_METHOD'] =="GET"){
     
      $id = strip_tags($_GET['consultantID']);
            
      deleteConsultant($id);
      
      header('Location: consultant.php');
      setcookie('Updated', 'Record updated!', time() + 10);
      exit;
    }
?>