<?php
  include("templates/connection.php");
 $id = $_POST['id'];

//user the database connection to get most of the variables needed to insert a new now
 $select = "SELECT * FROM `Items` WHERE ID = $id";
 $r = mysqli_query($dbs, $select);
 $row = mysqli_fetch_array($r);

 $name = $row['name'];
 $qty = $_POST['amount'];
 $price = $row['price'];
 $due = $qty * $price;


//insert a new row
 $insert = "INSERT INTO `Cart`(`name`, `price`, `qty`, `due`) VALUES ('$name',$price, $qty, $due)";
 mysqli_query($dbs, $insert);

//redirect back to the sending page. 
if($_POST['location'] == 'product'){
 header("Location:products.php");
  exit();
} else {
header("Location:sessions.php");
  exit();
}
 
?>