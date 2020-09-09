<script>
    $(document).ready(function () {


        $('.image').click(function () {

            $src = $(this).attr('src');
            $('.img').attr('src', $src);
            $('.full').fadeIn();
        });

        $('.full').click(function () {
            $(this).fadeOut();
        });


    });
</script>
<table cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <h2>Bildergalerie</h2></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>

<?php 
$sqlbilder = "SELECT b.gid,g.gid,album,bildid,datei,tags FROM galerie AS g JOIN bilder AS b ON g.gid=b.gid WHERE b.gid='".$_SESSION['gid']."'";
$bilder = sqlSelect($sqlbilder);

        $gid = $_SESSION['gid'];
        $sqltags = "SELECT tags FROM bilder WHERE gid='$gid'";
        $tags = sqlSelect($sqltags);
?>
    <table>
        <form name="searchpic" action="<?php echo getValue('phpmodule'); ?>" method="post">
        <tr>
            <td>
                <select name="stag">
                    <?php foreach($tags as $t){ echo '<option value='.$t['tags'].'>'.$t['tags'].'</option>';} ?>
                </select>
            </td>
            <td><input type="submit" name="find" value="Suchen"></td>
        </tr>
        </form>
        <?php
        if(empty($bilder)){
            echo "<h3>Keine Bilder vorhanden!</h3>";
            return false;
        }
        foreach($bilder as $b){ ?>
            <form name="deletepic" action="<?php echo getValue('phpmodule'); ?>" method="post">
                <tr>
                    
                        <?php 
                               $img = $b['datei'];
                               $tags = $b['tags'];
                               $id = $b['bildid'];
                               //$_SESSION['galid'] = $b['gid'];
                               echo "<td>";
                               echo "<input type='hidden' name='iddelete' value='$id'>";
                               //echo "<input type='hidden' name='idgal' value='".$_SESSION['galid']."'>";
                               echo "<div class='bild'><img class='image' src='$img'></div>";
                               echo "<h3>".$tags."</h3>";
                               echo "</td>";
                            ?>
                    
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="delete" value="Löschen" onclick="javascript: return confirm('Wollen Sie das Bild löschen?');">
                    </td>
                </tr>
            </form>
            <?php } ?>
            
    </table>
    <div class="full" hidden>
        <div class="fulltable">
            <div class="fullinner">
                <img src="" class="img">
            </div>
        </div>
    </div>