<?php
  include_once (__DIR__.'/../db/connect_db.php');

  if (isset($_POST["password"]) && isset($_POST["confirmation"]) && isset($_POST["id"]) && isset($_POST["log"]))
  {
    if (passwd_security($_POST["password"]) != "Success")
    {
      echo "wrong password";
      return;
    }
    if (($_POST["password"]) != $_POST["confirmation"])
    {
      echo "Password and Check must be the same";
      return;
    }
    $pdo = connect_db();
    $request = "UPDATE users SET passwd = ? WHERE acc_hash LIKE ?";
    $modify = "UPDATE users SET acc_hash = ? WHERE login LIKE ?";
    $passwd = hash(sha1, $_POST["password"]);
    $new_hash = hash(sha1, $_GET["log"] . (string)random_int(0, 700000));

    $sth = $pdo->prepare($request);
    $sth->execute(array($passwd, $_POST["id"]));
    $sth = $pdo->prepare($modify);
    $sth->execute(array($new_hash, $_POST["log"]));
    echo "Success";
  }
  else
  {
    echo "Fail";
    header("Location: ../index.php");
  }

  function passwd_security($pwd){
    if (strlen($pwd) < 8)
      return "Too Short";
    else if (!preg_match("#[0-9]+#", $pwd))
      return "allchar";
    else if (!preg_match("#[a-zA-Z]+#", $pwd))
      return "allnum";
    else
      return "Success";
  }
  ?>
