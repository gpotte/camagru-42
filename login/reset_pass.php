<html>
  <head>
    <title> Camagru : Password lost</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <meta charset="UTF-8">
  </head>

  <body>
    <div id="resultat">
    </div>
        <form action="reset_pass2.php" method="POST">
            <fieldset id="account_info">
              <legend>Password reset</legend>
              <input type="password" name="password" placeholder="new password" id="pwd" minlength="5" maxlength="15" required><br>
              <input type="password" name="confirmation" placeholder="confirmation" id="check" required><br>
              <input type="hidden" name="id" value="<?php if (isset($_GET["id"])){echo $_GET["id"];}?>">
              <input type="hidden" name="log" value="<?php if (isset($_GET["log"])){echo $_GET["log"];}?>">
              <input type="submit" value="Change my password" id="send"><br>
            </fieldset>
          </form>
    </body>
</html>
