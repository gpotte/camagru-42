<?php
  function get_user_id($pdo, $login)
  {
    $query = "SELECT id FROM users WHERE login LIKE ?";
    $sth = $pdo->prepare($query);
    $sth->execute(array($login));
    $result = $sth->fetch();
    return ($result["id"]);
  }
 ?>
