<?php

  include '../db/database.php';

  create_db();
  session_start();
  /*connect to the db */
  $DB_DSN = "mysql:host=localhost;";
  $DB_USER = "root";
  $DB_PASSWORD = "root";
  $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
  $pdo->exec("USE camagru;");
  /* Request to log the user */

  $check_log = "SELECT count(*) FROM users WHERE
                login LIKE '". $_POST["login"] ."'
                AND passwd LIKE '". hash(sha1, $_POST["password"]) ."' AND verified == 1;";
  if ($res = $pdo->query($check_log)) {
    if ($res->fetchColumn() > 0)
      echo "Success";
    else
      echo "Wrong login or password";
  }
  else
    print_r($dbh->errorInfo());
?>
