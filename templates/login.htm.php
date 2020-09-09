<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <title>Titel</title>
  </head>
    
  <body>
      <div class="login">
          <form name="login" action="<?php echo getValue('phpmodule'); ?>" method="post">
              <table>
                  <tr>
                      <td>Benutzername:</td>
                      <td><input type="text" name="benutzername" placeholder="E-Mail"></td>
                  </tr>
                  <tr>
                      <td>Passwort:</td>
                      <td><input type="password" name="passwort" placeholder="Passwort"></td>
                  </tr>
                  <tr>
                      <td><input type="submit" name="login" value="Login"</td>
                  </tr>
              </table>
          </form>
          </div>      
  </body>
</html>