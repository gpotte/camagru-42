<?php
  include 'gallery.php';

  session_start();
  if (!$_SESSION["username"])
    header('Location: ../login');
?>

<html>
<head>

  <title> Camagru </title>
  <link rel="stylesheet" type="text/css" href="../css/index.css">
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
  <table class="gallery">
    <?php full_gallery();?>
  </table>
</div>
<div class="footer">
  <p>camagru by gpotte</p>
</div>
</body>
</html>
