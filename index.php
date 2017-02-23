<?php
  include 'db/database.php';

  create_db();
  session_start();
  if (!$_SESSION["username"])
    header('Location: login/login.html');
?>

<html>
<head>

  <title> Camagru </title>
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <meta charset="UTF-8">

</head>
<body>
  <div id="resultat"></div>
  <div id="header">
    <h1>CAMAGRU</h1>
    <a href="login/logout.php"><img src="ressources/58950.svg"></img></a>
    <a href="manage_account/manage.php"><img src="ressources/295128.svg" title='<?php echo $_SESSION["username"]; ?>'></img></a>
  </div>
<div>
<div id="view_part">
  <video id="video"></video>
  <canvas id="canvas">Please Use a html5 compatible Browser</canvas>
  <canvas id="filter" ondrop="drop(event)" ondragover="allowDrop(event)">Please Use a html5 compatible Browser</canvas>
</div>
  <button id="startbutton">Prendre une photo</button>
  <input type="file" id="fileupload" accept="image/*" />
  <button id="reset">reset</button>
  <button id="finish">finish</button>
</div>
<div id="filter_container">
  <img id="filter_1" src=ressources/svg.png draggable="true"></img>
  <img id="filter_2" src=ressources/svg.png draggable="true"></img>
  <img id="filter_3" src=ressources/svg.png draggable="true"></img>
</div>
<script type="text/javascript" src="webcam/Webcam.js"></script>
<script type="text/javascript" src="webcam/select.js"></script>
<script type="text/javascript" src="webcam/filter.js"></script>
</body>
</html>
