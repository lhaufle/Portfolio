<?php

$id = $_POST['delete'];
include("templates/connection.php");

?>


<?php

$select = "DELETE FROM Users WHERE ID = $id";
$user = mysqli_query($dbs, $select);
echo "<script> window.location.href = 'admin.php' </script>";

?>