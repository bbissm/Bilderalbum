<table cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <h2>Fotoalben</h2></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>

<?php 
    $sqlgalerie = "SELECT album,gid FROM galerie WHERE bid='".$_SESSION['benutzerId']."'";
    $galerie = sqlSelect($sqlgalerie);
?>


    <div class="fotoalben">
        <table>
            <?php 
            if(empty($galerie))
            {
                echo "<h3>Keine Galerien vorhanden!</h3>";
                return false;
            }
            foreach($galerie as $g){ 
            ?>
                <form name="anzeigen" action="<?php echo getValue('phpmodule'); ?>" method="post">
                    <tr>
                        <td>
                            <?php 
                            if(!empty($g)){
                                
                                $id = $g['gid'];
                                echo "<input type='hidden' name='idvalue' value='$id'>";
                                echo $g['album'];
                            }
                            else
                            {
                                echo "Kein Album!";
                            }
                            ?>
                        </td>
                        <td>
                            <input type="submit" name="ansehen" value="Ansehen">
                        </td>
                        <td>
                            <input type="submit" name="deleteg" value="Löschen" onclick="javascript: return confirm('Wollen Sie diese Galerie löschen?');">
                        </td>
                    </tr>
                </form>
                <?php  } ?>
        </table>
    </div>