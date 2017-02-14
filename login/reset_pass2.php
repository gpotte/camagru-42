<?php
  if (isset($_POST["password"]) && isset($_POST["confirmation"]) && isset($_POST["id"]) && isset($_POST["log"]))
  {
    $DB_DSN = "mysql:dbname=CAMAGRU;host=localhost;";
    $DB_USER = "root";
    $DB_PASSWORD = "root";
    try {
      $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    }
    catch(PDOException $ex){
      $msg = "Failed to connect to the database";
    }
    $request = "UPDATE users SET passwd = ? WHERE acc_hash LIKE ?";
    $modify = "UPDATE users SET acc_hash = ? WHERE login LIKE ?";
    $passwd = hash(sha1, $_POST["password"]);
    $new_hash = hash(sha1, $_GET["log"] . (string)random_int(0, 700000));

    $sth = $pdo->prepare($request);
    $sth->execute(array($passwd, $_POST["id"]));
    $sth = $pdo->prepare($modify);
    $sth->execute(array($new_hash, $_POST["log"]));
      header("Location: login.html");
  }
  else
    header("Location: ../index.php");
  ?>
