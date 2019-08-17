<?php   //delete fact then return to the facts page
        include("templates/connection.php");
        //delete the fact
        $id = $_POST['id'];
        echo $id;
        $delete = "DELETE FROM `Facts` WHERE ID = $id";
        mysqli_query($dbs, $delete);
        //use javascript to avoid any header issues.
        echo "<script> window.location.href = 'facts.php' </script>";
?>