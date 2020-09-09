<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <title>Fotoalben erstellen</title>
  </head>
    
  <body>
      <div class="albenerstellen">
          <form name="addalbum" action="<?php echo getValue('phpmodule'); ?>" method="post">
              <table>
                  <tr>
                      <td>Album:</td>
                      <td><input type="text" name="album" placeholder="Album"></td>
                  </tr>
                  <tr>
                      <td><input type="submit" name="albenerstellen" value="Erstellen"</td>
                  </tr>
              </table>
          </form>
          </div>      
  </body>
</html>
