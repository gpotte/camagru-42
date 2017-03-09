<html>
  <head>
    <title> Camagru : Password lost</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <meta charset="UTF-8">
  </head>

  <body>
    <div id="resultat">
    </div>
        <form onsubmit="reset_pass(event)">
            <fieldset id="account_info">
              <legend>Password reset</legend>
              <input type="password" id="password" placeholder="new password" id="pwd"
              minlength="8" maxlength="15" required oninput="password_strength()"><br>
              <input type="password" id="confirmation" placeholder="confirmation" id="check" required><br>
              <input type="hidden" id="id" value="<?php if (isset($_GET["id"])){echo $_GET["id"];}?>">
              <input type="hidden" id="log" value="<?php if (isset($_GET["log"])){echo $_GET["log"];}?>">
              <input type="submit" value="Change my password" id="send"><br>
            </fieldset>
          </form>
    </body>
    <script type="text/javascript" src="reset_pass.js"></script>
</html>
