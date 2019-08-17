<?php
    ob_start;
    session_start();
    include("templates/template.php");
    include("templates/connection.php");

    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $comment = $_POST['text'];
    $id = (int)$_SESSION['id'];

    $insert = "INSERT INTO `SessionComments`(`name`, `rating`, `comment`, `user_id`) VALUES ('$name', '$rating', '$comment', $id)";
    mysqli_query($dbs, $insert);
    echo "<script>window.location.href='sessionReview.php'</script>";
    ob_flush();
?>