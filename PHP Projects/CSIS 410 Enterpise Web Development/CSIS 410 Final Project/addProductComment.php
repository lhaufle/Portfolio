<?php
    ob_start;
    session_start();
    include("templates/template.php");
    include("templates/connection.php");

    $name =   $_POST['name'];
    $rating = strip_tags($_POST['rating']);
    $comment = strip_tags($_POST['text']);
    $id = (int)$_SESSION['id'];

    $insert = "INSERT INTO `ProductComments`(`name`, `rating`, `comments`, `user_id`) VALUES ('$name', '$rating', '$comment', $id)";
    mysqli_query($dbs, $insert);
    header("Location:productReview.php");
    ob_flush();
?>