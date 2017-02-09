<?php
  include '../db/database.php';

  create_db();
  if ($_POST["password"] == $_POST["check"])
  {
    /*connect to the db */
    $DB_DSN = "mysql:host=localhost;";
    $DB_USER = "root";
    $DB_PASSWORD = "root";
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->exec("USE camagru;");

    /*create the new user request */
    $login = $_POST["login"];
    $mail = $_POST["mail"];
    $passwd = $_POST["password"];
    $request = "INSERT INTO `users` (`LOGIN`, `MAIL`, `PASSWD`) VALUES ( ?, ?, ?)";

    /*check if the user already exist */
    $check_log = "SELECT login FROM users WHERE login LIKE '". $login ."';";
    $check_mail = "SELECT login FROM users WHERE mail LIKE '" . $mail . "';";



    if (!$pdo->exec($check_log))
      echo "Login Already Taken";
    else if (!$pdo->exec($check_mail))
      echo "Mail Already Taken";
    else
    {
      $sth = $pdo->prepare($request);
      if ($sth->execute(array($login, $mail, hash(sha1, $passwd))) == True)
        echo "Success";
      else
        echo "Error While creating the account";
    }
  }
 ?>
