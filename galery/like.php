<?php
  include_once 'galery.php';
  include_once ('../db/connect_db.php');

  session_start();
  $pdo = connect_db();
  $get_user = "SELECT `id` FROM `users` WHERE `login` LIKE ?";
  $sth = $pdo->prepare($get_user);
  $sth->execute(array($_SESSION["username"]));
  $id_user = $sth->fetchColumn();
  if ($_POST["like"] == "LIKE")
  {
    $query = "INSERT INTO `like` (id_photo, id_user) VALUES (?, ?);";
    $sth = $pdo->prepare($query);
    $sth->execute(array($_POST["id"], $id_user));
  }
  else
  {
    $query = "DELETE FROM `like` WHERE id_photo = ? AND id_user = ?";
    $sth = $pdo->prepare($query);
    $sth->execute(array($_POST["id"], $id_user));
  }
  get_comm($_POST["id"]);
?>
