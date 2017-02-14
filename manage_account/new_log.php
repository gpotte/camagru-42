<?php
  session_start();
  $DB_DSN = "mysql:dbname=CAMAGRU;host=localhost;";
  $DB_USER = "root";
  $DB_PASSWORD = "root";
  try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
  }
  catch(PDOException $ex){
    $msg = "Failed to connect to the database";
  }


    $query = "UPDATE users SET login = ? WHERE id LIKE ?";
    $check = "SELECT login FROM users WHERE login LIKE ?";
    if (strlen($_POST["login"]) > 0 && strlen($_POST["login"]) < 15)
    {
      $sth = $pdo->prepare($check);
      $sth->execute(array($_POST["login"]));
      if ($sth->fetch() > 0)
        echo "used";
      else
      {
        $sth = $pdo->prepare($query);
        if (!$sth->execute(array($_POST["login"], $_POST["id"])))
          print_r($sth->errorInfo());
        else
        {
          $_SESSION["username"] = $_POST["login"];
          echo "Success";
        }
      }
    }
    else
      echo "invalid";
 ?>
