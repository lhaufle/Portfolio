<?php
    function displayHeader($title){
        /*
        displayHeader adds the inital html content to the page and takes
        an argument to add a title
       */
      ob_start();
      echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">';
      
      echo '<head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <meta name="description" content="Project 3 for csis 410" />
              <meta name="keywords" content="Picture Frames, Family Photos, Digital Rights"/>
              <meta name="author" content="Larry Haufle" />
              <title>'.$title.'</title>
              <link rel="stylesheet" type="text/css" href="style/style.css" />
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
              <link href="https://fonts.googleapis.com/css?family=Nanum+Myeongjo" rel="stylesheet"/> 
              <script src="script/scriptCMS.js" type="text/javascript"></script>
          </head>
          <body>';
}

 function displayMenu($access){
   echo '<div id="nav-bar"> 
         <div><h2><a class="nav-link" id="home" href="index.php">Home</a></h2></div> 
         <div><h2><a class="nav-link" id="aboutHover" >About &#9662;</a></h2>
         <div id="about" class="invisible">
            <p><a href="bio.php">Bio</a></p>
            <p><a href="facts.php">Facts</a></p>
            <p><a href="mission.php">Mission</a></p>
         </div>
         </div> 
         <div><h2><a class="nav-link" id="serviceHover" >Services  &#9662;</a></h2>
         <div id="services" class="invisible">
            <p><a href="sessions.php">Sessions</a></p>
            <p><a href="products.php">Products</a></p>
            <p><a href="charity.php">Charity</a></p>
         </div>
         </div> 
         <div><h2><a class="nav-link" id="reviewHover" >Reviews &#9662;</a></h2>
         <div id="reviews" class="invisible">
            <p><a href="rsessions.php">Rate Sessions</a></p>
            <p> <a href="rProducts.php">Rate Products</a></p>
            <p><a href="productReview.php">Product Reviews</a></p>
            <p><a href="sessionReview.php">Session Reviews</a></p>
         </div>
         </div>  
         <div><h2><a class="nav-link" id="contactHover" >Contact &#9662;</a></h2>
         <div id="contacts" class="invisible">
            <p><a href="questions.php">Questions</a></p>
            <p><a href="signup.php">Sign Up</a></p>
         </div>
         </div>
          <div><h2><a class="nav-link" id="cart" href="cart.php" >Cart</a></h2>
         </div>
          <div><h2><a class="nav-link" id="login"  href="login.php" >Login</a></h2>
                 </div>';
         if($access == 'admin'){
           echo '<div><h2><a class="nav-link" id="login"  href="logout.php" >Logout</a></h2>
                 </div>';
           echo '<div><h2><a class="nav-link" id="login"  href="admin.php" >Admin</a></h2>
                 </div>';
         }elseif($access = 'publisher' || $access == 'customer'){
            echo '<div><h2><a class="nav-link" id="login"  href="logout.php" >Logout</a></h2>
                 </div>';
         }
             
            
         
         echo '<div id="logos">
         <div><a class="nav-link"  href="https://twitter.com/" ><img src="images/twitter.png" alt="twitter" /></a>
         </div>
         <div><a class="nav-link"  href="https://www.instagram.com//" ><img src="images/insta.jpg" alt="instagram" /></a>
         </div>
         <div><a class="nav-link"  href="https://www.facebook.com//" ><img src="images/facebook.jpg" alt="facebook" /></a>
         </div>
         </div>
         </div>
          
</div>';
  }

function displayPageHeader($title){
  echo '<div class="header"><h1>'.$title.'</h1></div>';
}

function showTime(){
  /*
  showTime gets the current working directory of the file as an argument
  and displays the last time the current file was modified. 
 */
      $filename = getcwd();
      if (file_exists($filename)) {
      echo "<p> Last modified: " . date ("F d Y H:i:s.", filemtime($filename)); echo"</p>";
      }
}
 function displayFooter(){
  /*
  addFooter takes the link for xhtml validation as an argument and uses the showTime function
  to display informatin in a footer and adds the bottom tags to complete the html document.
 */
   $link = "<p>
             <a href=\"http://validator.w3.org/check?uri=referer\"><img
              src=\"http://www.w3.org/Icons/valid-xhtml10\" alt=\"Valid XHTML 1.0 Transitional\" height=\"31\" width=\"88\" /></a>
             </p>";
      echo "<div class=\"footer\">$link",showTime(),"</div>";
      ;
      echo "</body> </html>";
 }



?>