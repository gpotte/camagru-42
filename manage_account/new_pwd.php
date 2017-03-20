<?php
  include '../db/connect_db.php';
  session_start();
  $pdo = connect_db();

      $query = "UPDATE users SET passwd = ? WHERE login LIKE ?";
      if ($_POST["pwd"] === $_POST["check"] && passwd_security($passwd) == "Success")
      {
          $sth = $pdo->prepare($query);
          if (!$sth->execute(array(hash(sha1, $_POST["pwd"]), $_SESSION["username"])))
            print_r($sth->errorInfo());
          else
            echo "Success";
        }
      else
        echo "invalid";

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
