<?php

  function confirmation_mail($login, $mail, $acc_hash)
  {
    $link = "http://localhost:8080/camagru/mail/mail-confirmation.php?id=".$acc_hash."&log=".$login;
    $subject = "Inscription Camagru";
    $content = "<html>
                  <head>
                    <title> Camagru </title>
                    </head>
                    <body>
                    <p>Bonjour " . $login . " pour finaliser ton inscription clique sur ce lien</p>
                    <a href='".$link."'>confirmation de compte ! </a>
                    <p> ou va directement ici '".$link."'
                    </body>";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Camagru <noreply@camagru.lol>' . "\r\n";
    mail($mail, $subject, $content, $headers);
  }

  function reset_mail($login, $mail, $acc_hash)
  {
    $link = "http://localhost:8080/camagru/login/reset_pass.php?id=".$acc_hash["acc_hash"]."&log=".$login;
    $subject = "Mot de passe perdu : Camagru";
    $content = "<html>
                  <head>
                    <title> Camagru </title>
                    </head>
                    <body>
                    <p>Bonjour " . $login . " pour reinitialiser ton mot de passe clique sur ce lien</p>
                    <a href='".$link."'>confirmation de compte ! </a>
                    <p> ou va directement ici '".$link."'
                    </body>";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Camagru <noreply@camagru.lol>' . "\r\n";
    mail($mail, $subject, $content, $headers);
  }
?>
