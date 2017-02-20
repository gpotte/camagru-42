<?php

  include '../db/connect_db.php';
  include '../db/database.php';

  create_db();
  $pdo = connect_db();
  session_start();
  /*connect to the db */

  /* Request to log the user */
  $check_log = "SELECT login FROM users WHERE
                login LIKE ? AND passwd LIKE ? AND verified LIKE 1";
    $sth = $pdo->prepare($check_log);
    $sth->execute(array($_POST["login"], hash(sha1, $_POST["password"])));
    if ($log = $sth->fetch())
    {
      $_SESSION["username"] = $_POST["login"];
      echo "Success";
    }
    else
      echo "error";
?>
