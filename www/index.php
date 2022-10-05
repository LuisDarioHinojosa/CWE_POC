<?php
include_once("pdo.php");
session_start();




if(isset($_POST["username"]) && isset($_POST["password"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT name,user_id FROM users WHERE username = '$username' AND password = '$password'";
  $stmt = $pdo->query($sql);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($row !== false ){
    $_SESSION["success"] = "validated";
    $_SESSION["name"] = $row["name"];
    $_SESSION["user_id"] = $row["user_id"];

  }else{
    $_SESSION["success"] = "failed";
  }
  header("Location: index.php");
  return;

}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CWE-89</title>
    <meta name="description" content="description"/>
    <meta name="author" content="author" />
    <meta name="keywords" content="keywords" />
    <link rel="stylesheet" href="./stylesheet.css" type="text/css" />
    <style type="text/css">.body { width: auto; }</style>
  </head>
  <body>
    <h1>SQL Injection POC</h1>
    <h2>Please Login:</h2>
    <form method = "post">
            <label>username:</label> <input type="text" name="username" size="60"/></p>
            <label>password:</label> <input type="text" name="password" size="60"/></p>
            <input type="submit" value="Login">
    </form>
    <?php
    if(isset($_SESSION["success"])){

      if($_SESSION["success"] == "validated"){
        echo "<h2>Welcome, " . $_SESSION["name"] .  "!</h2>";
        echo "Get information:";
        echo "<br/>";
        echo "<a href='search.php'>your info</a>";
        echo "<br/>";
        echo "<a href='logout.php'>logout</a>";


      }
      elseif($_SESSION["success"] == "failed"){
        echo "incorrect cretentials :(";
        unset($_SESSION["success"]);
      }
    }else{
      echo "<h4>you are not logged in.</h4>";
    }

    
    ?>

  </body>
</html>