<?php
function addDoc(){
  /*
  addDoc adds the scrict html doctype to document. 
 */
  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">';
}
  function addHeader($title){
  /*
  add header adds the h1 head to the page and takes a 
  string argument to display.
 */
    echo 
    "<div class=\"proj-one-header\">
      <h1>
        $title
      </h1>
    </div>";
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
 function addFooter($logged){
  /*
  addFooter takes the link for xhtml validation as an argument and uses the showTime function
  to display informatin in a footer and adds the bottom tags to complete the html document.
 */
   if ($logged == True){
      $link = "<p>
             <a href=\"http://validator.w3.org/check?uri=referer\"><img
              src=\"http://www.w3.org/Icons/valid-xhtml10\" alt=\"Valid XHTML 1.0 Transitional\" height=\"31\" width=\"88\" /></a>
             </p>";
      echo "<div class=\"proj-one-footer\">$link",showTime(),"<p>--<button id='submit'><a href='logout.php'>Log Out</a></button></p> </div>";
      echo"</div>";
      echo "</body> </html>";
   } else{
      $link = "<p>
             <a href=\"http://validator.w3.org/check?uri=referer\"><img
              src=\"http://www.w3.org/Icons/valid-xhtml10\" alt=\"Valid XHTML 1.0 Transitional\" height=\"31\" width=\"88\" /></a>
             </p>";
      echo "<div class=\"proj-one-footer\">$link",showTime(), "--"."<p>Logged Out</p></div>";
      echo"</div>";
      echo "</body> </html>";
   }

 }


function checkPost($post, $title){
  /*
  Checks to see if index location has value and returns result of the value 
  if true. Set default value if false. 
 */
  if(empty($post)){
    $job = $title;
    return $job;
  } else {
    $job = $post;
    return $job;
  }
}

function addLogin(){
 /* addLogin function save time and space by creating a form */
    echo "<form action='login.php' method='post'>
           <p>
           <label for='userName' class='proj-five-label'>User Name:</label>
           <input type='text' name='userName' id='userName'/>
           </p>
           <p>
           <label for='password' class='proj-five-label'>Password:</label>
           <input type='password' name='password' id='password'/>
           <input type='submit' value='Log In'/>
           </p>
           </form>";
}


?>