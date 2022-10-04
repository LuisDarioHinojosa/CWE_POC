<?php
include_once("pdo.php");
session_start();
?>

<?php
if(isset($_POST["username"]) && isset($_POST["password"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT name FROM users WHERE username = '$username' AND password = '$password'";
  $stmt = $pdo->query($sql);
  $count = $stmt->rowCount();
  if($count > 0){
    $_SESSION["success"] = "validated";
  }else{
    $_SESSION["success"] = "failed";

  }
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
            <input type="submit" value="Add">
    </form>
    <?php
    if(isset($_SESSION["success"])){

      if($_SESSION["success"] == "validated"){
        echo "<h4>Welcome, </h4>";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          print_r($row["name"]);
        }
      }
      elseif($_SESSION["success"] == "failed"){
        echo "incorrect cretentials :(";
      }


    }
    
    ?>

  </body>
</html>