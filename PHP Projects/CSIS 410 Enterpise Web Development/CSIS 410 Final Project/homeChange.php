<?php 
    ob_start;
    include("templates/connection.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($_POST['change'] == 'update'){
        $header = strip_tags($_POST['header']);
        $body =  strip_tags($_POST['body']);
        $id = strip_tags($_POST['id']);
        //query
        $update = "UPDATE `HomePage` SET `header`= '$header',`body`= '$body' WHERE ID = $id";
        mysqli_query($dbs, $update);
        header("Location:index.php");
      }elseif($_POST['add'] == 'add'){
        $header = strip_tags($_POST['header']);
        $body =  strip_tags($_POST['body']);
        $id = strip_tags($_POST['id']);
        echo $header;
        echo $body;
        echo $id;
        $add = "INSERT INTO `HomePage`(`header`, `body`, `changeID`) VALUES ('$header', '$body', $id)";
        mysqli_query($dbs, $add);
        header("Location:index.php");
      }
    } else{
     $delete = FALSE;
     $modify = FALSE;
     $add = FALSE;
     $id = $_GET['id'];
      
      //determine which action was requested
    if($_GET['adjustment'] == 'delete'){
      $delete = TRUE;
    }elseif($_GET['adjustment'] == 'modify'){
      $modify = TRUE;
    }elseif($_GET['adjustment'] == 'add')
      $add = TRUE;
    }

?>

<?php
    if($delete){ //delete home screen post
      echo $delete;
      echo $id;
      echo $_GET['adjustment'];
      $deleteText = "DELETE FROM `HomePage` WHERE ID = $id";
      mysqli_query($dbs, $deleteText);
      header("Location:index.php");
      exit();
    }

    if($modify){ //modify home screen post
      $select = "SELECT * FROM HomePage WHERE ID = $id";
      $r = mysqli_query($dbs, $select);
      $row = mysqli_fetch_array($r);
      echo "<form action=\"homeChange.php\" method=\"post\">
              <p>Header:
              <input type=\"text\" name=\"header\" value=\"{$row['header']}\" />
              </p>
               <p>Body:
               <textarea rows=\"4\" cols=\"50\" name=\"body\">{$row['body']}</textarea>
                <input type=\"submit\" value=\"update\" />
              </p>
              <input type=\"hidden\" name=\"change\" value=\"update\" />
              <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\" />
            </form>";
    }

    if($add){
      $select = "SELECT * FROM HomePage WHERE ID = $id";
      $r = mysqli_query($dbs, $select);
      $row = mysqli_fetch_array($r);
            echo "<form action=\"homeChange.php\" method=\"post\">
              <p>Header:
              <input type=\"text\" name=\"header\" value=\"{$row['header']}\" />
              </p>
               <p>Body:
               <textarea rows=\"4\" cols=\"50\" name=\"body\">{$row['body']}</textarea>
                <input type=\"submit\" value=\"Add\" />
              </p>
              <input type=\"hidden\" name=\"add\" value=\"add\" />
              <input type=\"hidden\" name=\"id\" value=\"{$row['ID']}\" />
            </form>";
    }

ob_flush()
?>