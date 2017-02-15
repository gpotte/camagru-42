<?php
  print_r($_POST["data"]);
  $img = imagecreatefrompng($_POST["data"]);
  imagepng($img, "test.png", 5);
 ?>
