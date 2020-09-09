<?php
/*
 *
 */

/*
 *  Benutzer hinzufügen in der Datenbank
 */
function db_insert_benutzer($params) {
    $sql = "insert into benutzer (vorname, nachname, email, passwort)
            values ('".escapeSpecialChars($params['vorname'])."','".escapeSpecialChars($params['nachname'])."','".escapeSpecialChars($params['email'])."','".escapeSpecialChars(crypt($params['passwort']))."')";
    sqlQuery($sql);
}

/*
 *  Galerie/Alben erstellen
 */
function db_insert_alben($params) {
    $id = $_SESSION["benutzerId"];
    $sql = "insert into galerie (album, bid)
            values ('".escapeSpecialChars($params['album'])."','".$id."')";
    sqlQuery($sql);
}
    
/*
 *  Bild zu einer Galerie hinzufügen
 */
function db_insert_bilder($name,$datei,$tags,$gid) {
    $sql = "insert into bilder (name,datei,tags,gid)
            values ('".escapeSpecialChars($name)."','".escapeSpecialChars($datei)."','".escapeSpecialChars($tags)."','".$gid."')";
    sqlQuery($sql);
}

/*
 *  Bild in einer Galerie löschen
 */
function db_delete_bilder($id) {
    $sql = "delete from bilder where bildid='$id'";
    sqlQuery($sql);
}

/*
 *  Galerie löschen
 */
function db_delete_galerie($id) {
    $sqlgalerie = "delete from galerie where gid='$id'";
    $sqlbilder = "delete from bilder where gid='$id'";
    sqlQuery($sqlgalerie);
    sqlQuery($sqlbilder);
}

/*
 *  Benutzerdaten ändern
 */
function db_update_benutzer($id,$vorname,$name,$email) {
    $sql = "UPDATE benutzer SET vorname='$vorname', nachname='$name', email='$email' WHERE bid='$id';";
    sqlQuery($sql);
}

/*
 *  Benutzerdaten löschen
 */
function db_delete_benutzer($id) {
    $sql = "delete from benutzer where bid='$id'";
    sqlQuery($sql);
}
    ?>