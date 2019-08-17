<?php
  session_start();
  ini_set('display_errors', 0);
  include('../headAndFoot/template.php');
  addDoc(); //inlude doctype and strict html
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Project 3 for csis 410" />
  <meta name="keywords" content="Quality Review"/>
  <meta name="author" content="Larry Haufle" />
  <title>Login</title>
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
      <p><a href="form.php">Edit</a></p>
      <p><a href="Aven.php">Aven</a></p>
      <p><a href="Grayson.php">Grayson</a></p>
      <p><a href="/index.html">Projects</a></p>
    </div>
    
<?php
  addHeader("Login");
?>

  <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'){ //check to see if request method is post
        if(!empty($_POST['userName']) && !empty($_POST['password'])){  //vaerify both username and password were entered
          if($_POST['userName'] == "customer" && $_POST['password'] == "customer"){ //validate password
            //create sessions if username and password were correct
            $_SESSION['userName'] = $_POST['userName']; 
            $_SESSION['password'] = $_POST['password'];
            //if authorzied is set, it is because an unauthorized login was attempted before
            if(isset($_COOKIE['authorized'])){
              setcookie("authorized", "no", time()-3600); //clear cookie now that password and username were valid. 
            }
            header("location: index.php"); //redirect to the home page
            exit();
          } else{ //if username or password are wrong, then display the mesage and populate the form
          echo"<p>wrong username or password</p>";
            addLogin();
          } 
        } else {//if username or password were not entered, then display the message and populate form
          echo"<p>You must enter the user name or password</p>";
          addLogin();
        }
      } else{
        if($_COOKIE["authorized"] == "no"){ //if cookie is set, an invalid attempt was made, so message is displayed and form populated.
          echo"<p>You were not authorized please login!</p>";
          addLogin();
        }else{ //poplute form without message for first time entry
          addLogin();
        }
        
      }
   ?>

    
    

    
 <?php
    if($_SESSION['userName'] == "customer" && $_SESSION['password'] == "customer" ){
      addFooter(True); //add the footer and bottom of html
    } else{
      addFooter(False);
    }
    
 ?>

    
