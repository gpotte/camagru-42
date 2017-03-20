<?php
  include 'db/database.php';
  include 'gallery/gallery.php';

  create_db();
  session_start();
  if (!$_SESSION["username"])
    header('Location: login');
?>

<html>
<head>

  <title> Camagru </title>
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <meta charset="UTF-8">

</head>
<body>
  <div id="resultat"></div>
<div class="header">
    <h1>CAMAGRU</h1>
    <a href="login/logout.php"><img src="ressources/58950.svg"></img></a>
    <a href="manage_account/index.php"><img src="ressources/295128.svg" title='<?php echo $_SESSION["username"]; ?>'></img></a>
</div>
<br>
<div class="body">
  <div class="middle">
    <div id="view_part">
      <video id="video"></video>
      <canvas id="canvas">Please Use a html5 compatible Browser</canvas>
      <canvas id="filter">Please Use a html5 compatible Browser</canvas>
    </div>
    <div id="mini_gallery">
      <?php mini_gallery(); ?>
    </div>
  </div>
  <button id="startbutton">Prendre une photo</button>
  <input type="file" id="fileupload" accept="image/*" />
  <button id="reset">reset</button>
  <button id="finish">finish</button>
  <div id="filter_container">
    <img id="filter_1" src=ressources/cash.png draggable="true"></img>
    <img id="filter_2" src=ressources/cry.png draggable="true"></img>
    <img id="filter_3" src=ressources/doge.png draggable="true"></img>
    <img id="filter_4" src=ressources/harambe.png draggable="true"></img>
  </div>
</div>
<div class="footer">
  <p>camagru by gpotte</p>
</div>
<script type="text/javascript" src="webcam/Webcam.js"></script>
<script type="text/javascript" src="webcam/select.js"></script>
<script type="text/javascript" src="webcam/filter.js"></script>
</body>
</html>
