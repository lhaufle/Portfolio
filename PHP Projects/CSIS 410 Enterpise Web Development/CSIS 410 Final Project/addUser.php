<?php
    session_start();
    include("templates/connection.php");
    $name = strip_tags($_POST['name']);
    $passwordOne = strip_tags($_POST['passwordOne']);
    $passwordTwo = strip_tags($_POST["passwordTwo"]);
    $authorization = strip_tags($_POST['authorization']);

    if($passwordOne == $passwordTwo) { //make sure that passwords match
         $newUser = "INSERT INTO `Users`(`UserName`, `Pass`, `Privilege`) VALUES ('{$_POST['name']}',
                                        '{$_POST['passwordOne']}','{$_POST['authorization']}')";
         mysqli_query($dbs, $newUser);    

       header("Location:admin.php");
    } else {
        echo '<p>Password did not match <a href="admin.php">click here</a></p>';
    }


?>