<?php
    include("templates/connection.php");
    echo $_POST['update'];
    if($_POST['update'] == 'true'){
    $price = $_POST['price'];
    $id = $_POST['id'];
    $qty = $_POST['amount'];
    $due = $price * $qty;
    $update = "UPDATE `Cart` SET `qty`=$qty,`due`=$due WHERE ID =$id";
    mysqli_query($dbs, $update);
    echo "<script>window.location.href = 'cart.php'</script>";
    } else {
      $ID = $_POST['ID'];
      $delete = "DELETE FROM `Cart` WHERE ID = $ID";
      mysqli_query($dbs, $delete);
     echo "<script>window.location.href = 'cart.php'</script>";
    }

?>