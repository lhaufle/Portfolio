<?php
include("templates/connection.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $comment = $_POST['comment'];
      $fact = $_POST['fact'];
      
      $udpate = "UPDATE `Facts` SET`fact`='$fact',`description`='$comment' WHERE ID = $id";
      mysqli_query($dbs, $udpate);
      echo "<script>window.location.href= 'facts.php'</script>";
      
    } else {




      $id = $_GET['id'];
      $select = "SELECT * FROM Facts WHERE ID = $id";
      $r = mysqli_query($dbs, $select);
      $row = mysqli_fetch_array($r);
      echo "<form action=\"updatefact.php\" method=\"post\">
              <p>Fact:
              <input type=\"text\" name=\"fact\" value=\"{$row['fact']}\" />
              </p>
               <p>Comment:
               <textarea rows=\"4\" cols=\"50\" name=\"comment\">{$row['description']}</textarea>
                <input type=\"submit\" value=\"update\" />
              </p>
              <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\" />
            </form>";
    }

?>