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
