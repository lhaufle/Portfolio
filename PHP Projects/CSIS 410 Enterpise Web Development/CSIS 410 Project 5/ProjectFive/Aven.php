<?php
session_start();
  ini_set('display_errors', 0);
  include('../headAndFoot/template.php');

  addDoc(); //inlude doctype and strict html
  include('variables.php');
  authorized();
  //verify and use change or set default
  $age = strip_tags(checkPost($_POST['factOne'], "Two")); 
  $food = strip_tags(checkPost($_POST['factTwo'], "Candy"));
  $movie = strip_tags(checkPost($_POST['factThree'], "Baby Shark Video"));
  $goal = strip_tags(checkPost($_POST['factFour'], "Changes day to day"));
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Project 3 for csis 410" />
  <meta name="keywords" content="Quality Review"/>
  <meta name="author" content="Larry Haufle" />
  <title>Aven</title>
  <link rel="stylesheet" type="text/css" href="/styles/styles.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
  <script src="../scripts/projSix.js" type="text/javascript"></script>
</head>

<body>
  <div class="wrapper">

    <!--Nav Bar for project two using project one css-->
    <div class="proj-one-nav">
      <p><a href="index.php">Tree</a></p>
      <p><a href="Larry.php">Larry</a></p>
      <p><a href="Ashley.php">Ashley</a></p>
      <p><a href="Adelynn.php">Adylenn</a></p>
      <p><a href="form.php">Edit</a></p>
      <p><a href="Grayson.php">Grayson</a></p>
      <p><a href="/index.html">Projects</a></p>
    </div>

    <!--header-->
    <div class="proj-one-header">
      
      <h1>
        Aven
      </h1>
    </div>
    <!---Displays Picture and facts-->
    <div class="proj-two-person">
      <div class="proj-two-photo">
        <?php
          echo $aven['image'];
        ?>
        
      </div>
      <div class="proj-two-info">
        <h2>
          Fun Facts
        </h2>
        <?php
          echo "<p>Age: $age</p>";
          echo "<p> Favorite Food: $food</p>";
          echo "<p>Favorite Movies: $movie</p>";
          echo "<p>Professional Goal: $goal</p>";
        ?>

      </div>

    </div>

 <?php
    if($_SESSION['userName'] == "customer" && $_SESSION['password'] == "customer" ){
      addFooter(True); //add the footer and bottom of html
    } else{
      addFooter(False);
    }
    
 ?>