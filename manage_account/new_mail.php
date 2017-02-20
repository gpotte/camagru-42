<?php
  include "../db/connect_db.php";
  include "../mail/mail.php";
  session_start();
  $pdo = connect_db();

  $query = "UPDATE users SET mail = ? , VERIFIED = 0 WHERE login LIKE ?";
  $check = "SELECT mail FROM users WHERE mail LIKE ?";
  $get_hash = "SELECT acc_hash FROM users WHERE login LIKE ?";
  if (strlen($_POST["mail"]) > 0 && strlen($_POST["mail"]) < 50)
  {
    $sth = $pdo->prepare($check);
    $sth->execute(array($_POST["mail"]));
    if ($sth->fetch() > 0)
      echo "used";
    else
    {
      $sth = $pdo->prepare($query);
      if (!$sth->execute(array($_POST["mail"], $_SESSION["username"])))
        print_r($sth->errorInfo());
      else
      {
        $sth = $pdo->prepare($get_hash);
        $sth->execute(array($_SESSION["username"]));
        $hash = $sth->fetchColumn();
        confirmation_mail($_SESSION["username"], $_POST["mail"], $hash);
        echo "Success";
      }
    }
  }
  else
    echo "invalid";
?>
