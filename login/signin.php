<?php
  include '../db/connect_db.php';
  include '../mail/mail.php';

  create_db();
  if ($_POST["password"] == $_POST["check"])
  {
    /*connect to the db */
    $pdo = connect_db();


    /*create the new user request */
    $login = $_POST["login"];
    $mail = $_POST["mail"];
    $passwd = $_POST["password"];
    $acc_hash = hash(sha1, $_POST["mail"] . $_POST["password"]);
    $request = "INSERT INTO `users` (`LOGIN`, `MAIL`, `PASSWD`, `ACC_HASH`) VALUES ( ?, ?, ?, ?);";


    /*check if the user already exist */
    $check_log = "SELECT login FROM users WHERE login LIKE ?;";
    $check_mail = "SELECT login FROM users WHERE mail LIKE ?;";

    /* check if all info are valid */
    if (strlen($login) > 0 && strlen($login) < 15 &&
        strlen($mail) > 0 && strlen($mail) < 50 &&
        strlen($passwd) > 4 && strlen($passwd) < 15)
    {
      $sth = $pdo->prepare($check_log);
      $sth->execute(array($login));
      $sth2 = $pdo->prepare($check_mail);
      $sth2->execute(array($mail));
      if ($sth->fetch())
        echo "Login already Taken";
      else if ($sth2->fetch())
        echo "Mail Already Taken";
      else
      {
        $sth = $pdo->prepare($request);
        if ($sth->execute(array($login, $mail, hash(sha1, $passwd), $acc_hash)) === TRUE)
        {
          confirmation_mail($login, $mail, $acc_hash);
          echo "Success";
        }
        else
          print_r($sth->errorInfo());
        }
      }
      else
        echo "invalid";
    }
 ?>
