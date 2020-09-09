<script>
var tag = $('#tags').text();
var arr = tag.split(',');

</script>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <title>Titel</title>
</head>

<body>
    <div class="bilder">
        <form enctype="multipart/form-data" name="addpic" action="<?php echo getValue('phpmodule'); ?>" method="post">
            <?php 
              $sqlgalerie = "SELECT album, gid FROM galerie WHERE bid='".$_SESSION['benutzerId']."'";
              $galerie = sqlSelect($sqlgalerie);
                  
              ?>

                Album auswählen:
                <select name="album">
                    <?php foreach($galerie as $g){ echo '<option value='.$g['gid'].'>'.$g['album'].'</option>';}?>
                </select>
                <br>
                <br> Bild auswählen:
                <input name="datei" type="file" />
                <br>
                <br> Bildbeschreibung/Tags:
                <input type="text" id="tags" name="tags" placeholder="Tags">
                <br>
                <br>
                <input type="submit" name="addpic" value="Hinzufügen">
        </form>
    </div>
</body>

</html>