<?php

/***
The randomPassword function returns a random string that 
can be used for creating a new password
***/
function randomPassword(){
  $password = '';
  
  $password_length = rand(8, 12);
  
  for($i = 0; $i < $password_length; $i++ ){
    $password .= chr(rand(32, 126));
  }
  
  return $password;
  
}

/***
The sendPassword function sends an email to ther user 
with the required password input
***/
function sendPassword($email, $rand){
  $to = $email;
  $subject = 'Seeds of Change Password Request';
  $body = "Please enter $rand as your password then update once signed in";
  $headers = "From: SeedsOfChange@example.com";
  mail($to, $subject, $body, $headers);
}
