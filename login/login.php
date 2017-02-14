<?php

  include '../db/database.php';

  create_db();
  session_start();
  /*connect to the db */
  $DB_DSN = "mysql:dbname=CAMAGRU;host=localhost;";
  $DB_USER = "root";
  $DB_PASSWORD = "root";
  try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
  }
  catch(PDOException $ex){
    $msg = "Failed to connect to the database";
  }

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
