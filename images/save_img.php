<?php
  include (__DIR__."/../user_info/get_user_info.php");

  function get_last_id($pdo)
  {
    $sth = $pdo->prepare("SELECT id FROM photo ORDER BY id DESC");
    $sth->execute();
    $res = $sth->fetch();
    if (!$res)
      return (0);
    return ($res['id']);
  }

  function save_img($id, $data, $filter, $x, $y)
  {
    $img = imagecreatefrompng($data);
    $png = imagecreatefrompng($filter);
    imagecolortransparent($png, imagecolorat($png, 0, 0));
    imagecopymerge($img, $png, 0, 0, 0, 0, 960, 720, 100);
    imagepng($img, $id .".png", 5);
  }

  function save_into_db($id, $pdo, $login)
  {
    $user_id = get_user_id($pdo, $login);
    $query = "INSERT INTO `photo` (`ID`, `DATE`, `ID_USER`, `PATH`) VALUES ( ?, CURDATE(), ?, ?);";
    $sth = $pdo->prepare($query);
    $sth->execute(array($id, $user_id, $id.".png"));
  }
?>
