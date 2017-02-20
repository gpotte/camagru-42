<?php
  include '../db/connect_db.php';
  session_start();
  $pdo = connect_db();

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
