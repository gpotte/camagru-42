<?php
    include_once (__DIR__.'/../db/connect_db.php');
    session_start();

    $id = $_POST["delete"];
    $pdo = connect_db();
    $comment_query = "DELETE FROM `photo` WHERE `id` = ?";
    $photo_query = "DELETE FROM `like` WHERE `id_photo` = ?";
    $like_query = "DELETE FROM `comment` WHERE `id_photo` = ?";

    unlink("../images/" . $id .".png");
    $sth = $pdo->prepare($comment_query);
    try {
    $sth->execute(array($id));
    }
    catch (PDOException $e){
      echo "error on comment delete: ->" . $e->getMessage();
      die();
    }
    $sth = $pdo->prepare($photo_query);
    try {
    $sth->execute(array($id));
    }
    catch (PDOException $e){
      echo "error on photo delete: ->" . $e->getMessage();
      die();
    }
    $sth = $pdo->prepare($like_query);
    try {
    $sth->execute(array($id));
    }
    catch (PDOException $e){
      echo "error on like delete: ->" . $e->getMessage();
      die();
    }
    header("Location: index.php");
  ?>
