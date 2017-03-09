<?php
  if (strlen($_POST["password"]) < 8)
    echo "Too Short";
  else if (!preg_match("#[0-9]+#", $_POST["password"]))
    echo "allchar";
  else if (!preg_match("#[a-zA-Z]+#", $_POST["password"]))
    echo "allnum";
  else
    echo "Success";
 ?>
