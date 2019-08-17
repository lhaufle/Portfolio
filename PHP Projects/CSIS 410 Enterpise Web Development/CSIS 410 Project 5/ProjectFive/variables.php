<?php //array variables to hold each member of the tree and the required values for the assigment. 
$larry = array("name"=>"Larry Haufle","link"=>"<a href='Larry.php'>See Bio</a>", "image"=>"<img src='/images/Larry.jpg'/>");
$ashley = array("name"=>"Ashley Haufle", "link"=>"<a href='Ashley.php'> See Bio</a>",
                "image"=>"<img src='/images/Ashley.jpg'/>");
$adelynn = array("name"=>"Adylenn Haufle", "link"=>"<a href='Adelynn.php'> See Bio</a>",
                 "image"=>"<img src='/images/Adelynn.jpg'/>");
$aven = array("name"=>"Aven Haufle", "link"=>"<a href='Aven.php'> See Bio</a>","image"=>
              "<img src='/images/Aven.jpg'/>");
$grayson = array("name"=>"Grayson Haufle", "link"=>"<a href='Grayson.php'> See Bio</a>","image"=>
                 "<img src='/images/Grayson.jpg'/>");
?>

<?php
  //if session is not present then the user will be redirected to the login screen
  function authorized(){
    if($_SESSION['userName'] != "customer" || $_SESSION['password'] != "customer"){
      setcookie("authorized", "no", time() + 500);
      header("location: login.php");
      exit();
    }
  }
?>

<?php
//clear all sussions
 function clearSession(){
   unset($_SESSION['userName']);
   unset($_SESSION['password']);
   session_destroy();
 }
?>