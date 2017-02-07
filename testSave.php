<?php

  header('Content-Type: image/png');
  $img = imagecreatefrompng($_POST["data"]);
  ;imagepng($img);
  imagedestroy($img);
?>
