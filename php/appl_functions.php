<?php
/*
 *
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 *
 */

/*
 * Gibt die entsprechende CSS-Klasse aus einem assiziativen Array (key: Name Eingabefeld) zurück.
 * Wird im Template aufgerufen.
 *
 * @param   $name       Name des Eingabefeldes
 */
function getCssClass( $name ) {
    global $css_classes;
    if (isset($css_classes[$name])) return $css_classes[$name];
    else return getValue('cfg_css_class_normal');
}

/*
 * Beinhaltet die Anwendungslogik zur Anzeige und zum erstellen von Fotoalben
 */
function addalben() {
    if (isset($_POST['albenerstellen'])) {
        
        $albenname = $_POST['album'];
        if(!CheckEmpty($albenname))
        {
            echo '<script language="javascript">';
            echo 'alert("Bitte Galeriename eingeben!")';
            echo '</script>';
            header('Refresh:0');
            return false;
        }
        else
        {
            db_insert_alben($_REQUEST);
        }
  }
    // Template abfüllen und Resultat zurückgeben
    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/addalben.htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zur Anzeige und zum Bearbeiten von allen Fotoalben
 */
function fotoalben() {
    if(isset($_POST['ansehen']))
    {
        $_SESSION['gid'] = $_POST['idvalue'];
        setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
        return runTemplate( "../templates/showpic.htm.php" );
    }
    
    if(isset($_POST['delete']))
    {
        $id = $_POST['iddelete'];
        db_delete_bilder($id);
    }
    
    if(isset($_POST['deleteg']))
    {
        $id = $_POST['idvalue'];
        db_delete_galerie($id);
    }
      
    // Template abfüllen und Resultat zurückgeben
    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/fotoalben.htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zum Bilder Hochladen
 */
function addbilder() {
    if(isset($_POST['addpic']))
    {
        if($_FILES['datei']['size'] == 0)
        {
            echo '<script language="javascript">';
            echo 'alert("Bitte Bild auswählen!")';
            echo '</script>';
            header('Refresh:0');
            return false;
        }
        else
        {
            $uploaddir = '..\images/';
            $name = $_FILES['datei']['name'];
            $datei = $uploaddir.basename($_FILES['datei']['name']);
            $tags = $_POST['tags'];
            $gid = $_POST['album'];
            move_uploaded_file($_FILES['datei']['tmp_name'], $datei);
            db_insert_bilder($name,$datei,$tags,$gid);
        }
        
    }
    
    // Template abfüllen und Resultat zurückgeben
    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/addbilder.htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zum Editieren und Löschen von Benutzerdaten
 */
function benutzer() {
    
    if(isset($_POST['update']))
    {
        $id = $_SESSION['benutzerId'];
        $vorname = $_POST['editvorname'];
        $name = $_POST['editnachname'];
        $email = $_POST['editemail'];
        
        if(!CheckEmpty($vorname) && !CheckEmpty($name) && !CheckEmpty($email))
        {
            echo '<script language="javascript">';
            echo 'alert("Keine Änderungen!")';
            echo '</script>';
            header('Refresh:0');
            return false;
        }
        else
        {
            db_update_benutzer($id,$vorname,$name,$email);
        }
    }
    
    if(isset($_POST['delete']))
    {
        $id = $_SESSION['benutzerId'];
        db_delete_benutzer($id);
        header('Refresh:0');
        session_destroy();
    }
    
    // Template abfüllen und Resultat zurückgeben
    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/benutzer.htm.php" );
}
?>