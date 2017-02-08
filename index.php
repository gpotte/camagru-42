<?php
  include 'db/database.php';

  create_db();
  session_start();
  if (!$_SESSION["Username"])
    header('Location: login/login.html');
?>

<html>
<head>

  <title> Camagru </title>
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
  <div id="header">
    <h1>CAMAGRU</h1>
    <a href="#"><img src="ressources/58950.svg"></img></a>
    <a href="#"><img src="ressources/295128.svg"></img></a>
  </div>
<div>
  <video id="video"></video>
  <button id="startbutton">Prendre une photo</button>
  <canvas id="canvas"></canvas>
</div>
<div id="filter_container">
  <img id="filter_1" src=ressources/svg.png></img>
  <img id="filter_2" src=ressources/svg.png></img>
  <img id="filter_3" src=ressources/svg.png></img>
</div>
<script type="text/javascript" src="webcam/Webcam.js"></script>
<script type="text/javascript" src="webcam/select.js"></script>
</body>
</html>
