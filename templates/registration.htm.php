<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <title>Titel</title>
  </head>
    
  <body>
      <div class="register">
          <form name="registration" action="<?php echo getValue("phpmodule"); ?>" method="post">
              <table>
                  <tr>
                      <td>Vorname:</td>
                      <td><input type="text" name="vorname" value="<?php echo getHtmlValue("vorname"); ?>" placeholder="Vorname"></td>
                  </tr>
                  <tr>
                      <td>Nachname:</td>
                      <td><input type="text" name="nachname" value="<?php echo getHtmlValue("nachname"); ?>" placeholder="Nachname"></td>
                  </tr>
                  <tr>
                      <td>E-Mail:</td>
                      <td><input type="text" name="email" value="<?php echo getHtmlValue("email"); ?>" placeholder="E-Mail"></td>
                  </tr>
                  <tr>
                      <td>Passwort:</td>
                      <td><input type="password" name="passwort" value="<?php echo getHtmlValue("passwort"); ?>" placeholder="Passwort"></td>
                  </tr>
                  <tr>
                      <td><input type="submit" name="registrieren" value="Registrieren"</td>
                      <td><input type="button" name="bedingung" id="bedingung" value="Passwortbedingungen"</td>
                  </tr>
              </table>
              <div id="pw" hidden>
              <p>Die Länge: 8-20 Zeichen</p>
              <p>Mindestens 1 -> Ziffer, Kleinbuchstabe, Grossbuchstabe, Sonderzeichen</p></div>
             
          </form>
          </div>      
  </body>
</html>

<script>
    $("#bedingung").click(function(){
    $("#pw").fadeIn();
});</script>