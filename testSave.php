<?php
  include 'db/connect_db.php';
  include 'images/save_img.php';

  session_start();
  $pdo = connect_db();
  $id = get_last_id($pdo);
  $id++;
  save_img($id, $_POST["data"], $_POST["filter"], $_POST["x"], $_POST["y"]);
  save_into_db($id, $pdo, $_SESSION["username"]);
  echo "Success";
?>
