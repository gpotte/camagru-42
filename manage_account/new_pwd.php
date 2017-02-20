<?php
  include '../db/connect_db.php';
  session_start();
  $pdo = connect_db();

      $query = "UPDATE users SET passwd = ? WHERE login LIKE ?";
      if (strlen($_POST["pwd"]) > 4 && strlen($_POST["pwd"]) < 15 &&
          $_POST["pwd"] === $_POST["check"])
      {
          $sth = $pdo->prepare($query);
          if (!$sth->execute(array(hash(sha1, $_POST["pwd"]), $_SESSION["username"])))
            print_r($sth->errorInfo());
          else
            echo "Success";
        }
      else
        echo "invalid";
?>
