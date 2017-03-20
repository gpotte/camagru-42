<?php
  include 'gallery.php';

  session_start();
  if (!$_SESSION["username"])
    header('Location: ../login');
  if (!isset($_GET["id"]))
    header('Location: index.php');
?>

<html>
<head>

  <title> Camagru </title>
  <link rel="stylesheet" type="text/css" href="../css/showpic.css">
  <meta charset="UTF-8">

</head>
<body>
  <div id="resultat"></div>
<div class="header">
    <a href="../index.php"><h1>CAMAGRU</h1></a>
    <a href="../login/logout.php"><img src="../ressources/58950.svg"></img></a>
    <a href="../manage_account/index.php"><img src="../ressources/295128.svg" title='<?php echo $_SESSION["username"]; ?>'></img></a>
</div>
<div class="body">
  <?php get_pic($_GET["id"]);?>
  <?php delete_button($_GET["id"]); ?>
  <table id="comment">
    <?php get_comm($_GET["id"]);?>
  </table>
</div>
<div class="footer">
  <p>camagru by gpotte</p>
</div>
<input type="hidden" id='id' value="<?php echo $_GET["id"];?>"></input>
</body>
<script type="text/javascript" src="comment.js"></script>
</html>
