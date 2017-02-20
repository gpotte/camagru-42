<?php
  include '../db/connect_db.php';
  include '../mail/mail.php';

    /*connect to the db */
    $pdo = connect_db();

    /*create the new user request */
    $login = $_POST["login"];
    $mail = $_POST["mail"];
    $request = "SELECT acc_hash FROM users WHERE login LIKE ? AND mail LIKE ?";

    /*check if the user already exist */
      $sth = $pdo->prepare($request);
      $sth->execute(array($login, $mail));
      $acc_hash = $sth->fetch();
      if ($acc_hash)
      {
        reset_mail($login, $mail, $acc_hash);
        echo "Success";
      }
      else
        print_r($acc_hash);
 ?>
