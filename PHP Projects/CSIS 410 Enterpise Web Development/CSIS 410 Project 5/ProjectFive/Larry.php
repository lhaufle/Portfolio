<?php
session_start();
  ini_set('display_errors', 0);
  include('../headAndFoot/template.php');

  addDoc(); //inlude doctype and strict html
  include('variables.php');
  authorized();
  //check values from post array and set variables
  $job = strip_tags(checkPost($_POST['factOne'], 'Credit Analyst'));
  $food = strip_tags(checkPost($_POST['factTwo'], "Sushi or Indian"));
  $movie = strip_tags(checkPost($_POST['factThree'], "Lord of the Rings"));
  $goal = strip_tags(checkPost($_POST['factFour'], "Database Admin or Web developer"));
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Project 3 for csis 410" />
  <meta name="keywords" content="Quality Review"/>
  <meta name="author" content="Larry Haufle" />
  <title>Larry</title>
  <link rel="stylesheet" type="text/css" href="/styles/styles.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
  <script src="../scripts/projSix.js" type="text/javascript"></script>
</head>

<body>
  <div class="wrapper">

    <!--Nav Bar for project two using project one css-->
    <div class="proj-one-nav">
      <p><a href="index.php">Tree</a></p>
      <p><a href="form.php">Edit</a></p>
      <p><a href="Ashley.php">Ashley</a></p>
      <p><a href="Adelynn.php">Adylenn</a></p>
      <p><a href="Aven.php">Aven</a></p>
      <p><a href="Grayson.php">Grayson</a></p>
      <p><a href="/index.html">Projects</a></p>
    </div>

    <!--header-->
    <div class="proj-one-header">
      <h1>
        Larry
      </h1>
    </div>
    <!---Displays Picture and facts-->
    <div class="proj-two-person">
      <div class="proj-two-photo">
        <?php
          echo $larry['image'];
        ?>
        
      </div>
      <div class="proj-two-info">
        <h2>
          Fun Facts
        </h2>
        <?php
          echo "<p>Current Position: $job</p>";
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