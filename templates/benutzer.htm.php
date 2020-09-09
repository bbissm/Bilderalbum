<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <title>Titel</title>
  </head>
    <?php
    $sqldaten = "SELECT * FROM benutzer WHERE bid='".$_SESSION['benutzerId']."'";
    $daten = sqlSelect($sqldaten);
    foreach ($daten as $d){
    ?>
  <body>
      <div class="benutzer">
          <form name="edit" action="<?php echo getValue("phpmodule"); ?>" method="post">
              <table>
                  <tr>
                      <td>Vorname:</td>
                      <td><input type="text" name="editvorname" value="<?php echo $d['vorname']; ?>" placeholder=""></td>
                  </tr>
                  <tr>
                      <td>Nachname:</td>
                      <td><input type="text" name="editnachname" value="<?php echo $d['nachname']; ?>" placeholder=""></td>
                  </tr>
                  <tr>
                      <td>E-Mail:</td>
                      <td><input type="text" name="editemail" value="<?php echo $d['email']; ?>" placeholder=""></td>
                  </tr>
                  <tr>
                      <td><input type="submit" name="update" value="Änderungen speichern"</td>
                      <td><input type="submit" name="delete" value="Benutzer löschen" onclick="javascript: return confirm('Wollen Sie diesen Benutzer löschen?')"</td>
                  </tr>
              </table>
          </form>
          </div>      
  </body>
    <?php } ?>
 
</html>


