<?php
  include '../db/connect_db.php';
  session_start();
  if (!$_SESSION["username"])
    header('Location: login');
  $pdo = connect_db();
  $query = "SELECT mail FROM users WHERE LOGIN LIKE ?";
  $sth = $pdo->prepare($query);
  $sth->execute(array($_SESSION["username"]));
  $acc = $sth->fetch();
?>

<html>
<head>

  <title> Camagru </title>
  <link rel="stylesheet" type="text/css" href="../css/manage.css">
  <meta charset="UTF-8">

</head>
<body>
  <div id="resultat">
  </div>
  <div id="header">
    <a href="../index.php"><h1>CAMAGRU</h1></a>
    <a href="../login/logout.php"><img src="../ressources/58950.svg"></img></a>
    <a href="#"><img src="../ressources/295128.svg" title='<?php echo $_SESSION["username"]; ?>'></img></a>
  </div>
  <div>
    <table>
      <tr>
        <td id="current_login">
          <?php echo $_SESSION["username"];?>
        </td>
      </tr>

      <tr>
        <td id="current_mail">
          <?php echo $acc["mail"];?>
        </td>
        <td>
          <input type="email" name="mail" placeholder="email" id="mail" maxlength="50"><br>
        </td>
        <td>
          <button id="mail_button">Change Mail</button>
        </td>
      </tr>

      <tr>
        <td>
          <input type="password" name="password" placeholder="new password" id="pwd" minlength="5" maxlength="15">
        </td>
        <td>
          <input type="password" name="check" placeholder="confirmation" id="check" minlength="5" maxlength="15">
        </td>
        <td>
          <button id="pwd_button">Change Password</button>
        </td>
      </tr>
    </table>
  </div>
</body>
<script type="text/javascript" src="manage.js"></script>
</html>
