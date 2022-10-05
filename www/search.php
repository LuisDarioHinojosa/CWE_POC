<?
require_once("pdo.php");
session_start();



if(!isset($_SESSION["user_id"])){
    $_SESSION['success'] = "Missing profile_id";
    header("Location index.php");
    return;
}
if(isset($_POST["id_submit"])){
    $id_submit = $_POST["id_submit"];
    $_SESSION["id_submit"] = $id_submit;
    header("Location: search.php");
    return;
}


?>



<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hello!</title>
    <meta name="description" content="description"/>
    <meta name="author" content="author" />
    <meta name="keywords" content="keywords" />
    <link rel="stylesheet" href="./stylesheet.css" type="text/css" />
    <style type="text/css">.body { width: auto; }</style>
  </head>
  <body>

    <?php
    echo "<h3>Your user id is :" . $_SESSION["user_id"] . "</h3>";
    ?>
    <h2>Get your information:</h2>
    <form method = "post">
            <label>id:</label> <input type="text" name="id_submit" size="60"/></p>
            <input type="submit" value="Get">
    </form>

    <?php

    if(isset($_SESSION["id_submit"])){
        $query_id = $_SESSION["id_submit"];
        $name = $_SESSION["name"];
        $sql = "SELECT * FROM users WHERE user_id = '$query_id'";
        //echo $sql;
        $stmt = $pdo->query($sql);
        echo "<table border='1'>"."\n";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>";
            echo $row["name"];
            echo "</td><td>";
            echo $row["username"];
            echo "</td><td>";
            echo $row["user_id"];
            echo "</td><td>";
            echo $row["password"];
            echo "</td></tr>\n";
            echo "<br/>";
        }
        echo "</table>\n";            
        
      }
    
    
    ?>
    <br/>
    <a href = "index.php">Back</a>

  </body>
</html>


