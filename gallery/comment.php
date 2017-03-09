<?php
  include 'gallery.php';
  include '../mail/mail.php';
  include_once ('../db/connect_db.php');

  if (!$_POST["comment"])
    return (get_comm($_POST["id"]));
  session_start();
  $pdo = connect_db();
  $get_user = "SELECT id FROM users WHERE login LIKE ?";
  $get_user2 = "SELECT login, mail FROM users INNER JOIN photo ON photo.id_user = users.id WHERE photo.id LIKE ?";
  $query = "INSERT INTO `comment` (`id_photo`, `id_user`, `com`) VALUES (?, ?, ?);";
  $sth = $pdo->prepare($get_user);
  $sth->execute(array($_SESSION["username"]));
  $id_user = $sth->fetchColumn();
  $sth = $pdo->prepare($get_user2);
  $sth->execute(array($_POST["id"]));
  $photo_login = $sth->fetch();
  $sth = $pdo->prepare($query);
  $sth->execute(array($_POST["id"], $id_user, $_POST["comment"]));
  comment_mail($_SESSION["username"], $photo_login,
              "http://localhost:8080/camagru/gallery/showpic.php?id=".$_POST["id"]);
  get_comm($_POST["id"]);
 ?>
