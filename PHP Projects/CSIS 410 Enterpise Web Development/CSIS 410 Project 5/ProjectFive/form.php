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
  <title>Edit Profiles</title>
  <link rel="stylesheet" type="text/css" href="/styles/styles.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
  <script src="../scripts/projFour.js" type="text/javascript"></script>
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
      <p><a href="Aven.php">Aven</a></p>
      <p><a href="Grayson.php">Grayson</a></p>
      <p><a href="/index.html">Projects</a></p>
   
</div>
   
<?php
        addHeader("Edit Information");
?>

<form action="" method="post" id="directPage">
  <div>
               <p class="proj-four-label">Select a name:
 
                <select id="info">
                     <option value="Select">Select</option>
                     <option value="Adelynn">Adelynn</option>
                     <option value="Ashley">Ashley</option>
                     <option value="Aven">Aven</option>
                     <option value="Grayson">Grayson</option>
                     <option value="Larry">Larry</option>
                </select>
                 
                </p>
             
                <p id ="age" class="proj-four-label" >Current Position:</p> 
                <input class="proj-four-input" type="text" name="factOne"/>
                <p class="proj-four-label" >Favorite Food:</p> 
                <input class="proj-four-input" type="text" name="factTwo"/>
                <p class="proj-four-label" >Favorite Movies:</p> 
                <input class="proj-four-input" type="text" name="factThree"/>
                <p class="proj-four-label" >Professional Goals:</p> 
                <input class="proj-four-input" type="text" name="factFour"/>
  
     <input type="submit" value="Submit Change" id="proj-four-button"/> 
  
  </div>
</form>

 <?php
    if($_SESSION['userName'] == "customer" && $_SESSION['password'] == "customer" ){
      addFooter(True); //add the footer and bottom of html
    } else{
      addFooter(False);
    }
    
 ?>