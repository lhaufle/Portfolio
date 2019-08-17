<?php
 session_start();
 $_SESSION['access'] = '';
 session_destroy();
 header("Location:login.php");
?>