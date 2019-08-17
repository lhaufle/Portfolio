<?php
  session_start();
  include('variables.php');
  clearSession();
  header("location: login.php");
?>
