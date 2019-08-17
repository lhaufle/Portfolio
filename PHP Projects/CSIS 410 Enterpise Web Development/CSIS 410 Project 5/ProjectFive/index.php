<?php
session_start();
  include('../headAndFoot/template.php');
  addDoc(); //inlude doctype and strict html
  include('variables.php');
  authorized();
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Project 3 for csis 410" />
  <meta name="keywords" content="Quality Review"/>
  <meta name="author" content="Larry Haufle" />
  <title>Family Tree</title>
  <link rel="stylesheet" type="text/css" href="/styles/styles.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
  <script src="../scripts/projSix.js" type="text/javascript"></script>
</head>

<body>
  <div class="wrapper">

    <!--Nav Bar for project two using project one css-->
    <div class="proj-one-nav">
      <p><a href="#">Tree</a></p>
      <p><a href="Larry.php">Larry</a></p>
      <p><a href="Ashley.php">Ashley</a></p>
      <p><a href="Adylenn.php">Adylenn</a></p>
      <p><a href="Aven.php">Aven</a></p>
      <p><a href="Grayson.php">Grayson</a></p>
      <p><a href="/index.html">Projects</a></p>
    </div>

    <!--header-->
    <div class="proj-one-header">
      <h1>
        Family Tree
      </h1>
    </div>
    <!---Displays Picture and facts-->
    <div class="proj-two-main">
      <div id="parents">
        <div id="dad">
         <?php
        //use array variabes to display name and link for Larry
        echo "<h2>". $larry['name']."<h2>";
        echo $larry['link'];
        
        ?>
        </div>
        <div id='mom'>
        <?php
         //use array variabes to display name and link for ashley
        echo "<h2>". $ashley['name']."<h2>";
        echo $ashley['link'];
        ?>
        </div>
      </div>
      <div id="children">
        <div id='Adelynn'>
        <?php
         //use array variabes to display name and link for ashley
        echo "<h2>". $adelynn['name']."<h2>";
        echo $adelynn['link'];
        ?>
        </div>
        <div id='Aven'>
        <?php
         //use array variabes to display name and link for ashley
        echo "<h2>". $aven['name']."<h2>";
        echo $aven['link'];
        ?>
        </div>
        <div id='Grayson'>
        <?php
         //use array variabes to display name and link for ashley
        echo "<h2>". $grayson['name']."<h2>";
        echo $grayson['link'];
        ?>
        </div>
        
      </div>
    </div>
 
 <?php
    if($_SESSION['userName'] == "customer" && $_SESSION['password'] == "customer" ){
      addFooter(True); //add the footer and bottom of html
    } else{
      addFooter(False);
    }
    
 ?>