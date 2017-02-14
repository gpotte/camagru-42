<?php
  session_start();
  unset($_SESSION["username"]);
  unset($_SESSION["restrict"]);
  header('Location: ../index.php');
?>
