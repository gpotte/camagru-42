<?php

  /*connect to the db */
  session_start();
  $DB_DSN = "mysql:dbname=CAMAGRU;host=localhost;";
  $DB_USER = "root";
  $DB_PASSWORD = "root";
  $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);

  /*request to validate the account */
  $request = "UPDATE users SET verified = 1 WHERE acc_hash LIKE ? AND login LIKE ?";

  /*modifying the hash for more security */
  $modify = "UPDATE users SET acc_hash = ? WHERE login LIKE ?";

  if (isset($_GET["id"]) && isset($_GET["log"]))
  {
    $sth = $pdo->prepare($request);
    $sth2 = $pdo->prepare($modify);
    $new_hash = hash(sha1, $_GET["log"] . (string)random_int(0, 700000));
    if ($sth->execute(array($_GET["id"], $_GET["log"])))
    {
      $sth2->execute(array($new_hash, $_GET["log"]));
      $_SESSION["username"] = $_GET["log"];
    }
    header('Location: ../index.php');
  }
 ?>
