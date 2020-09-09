<?php
/*
 *
 *  Dieses Modul beinhaltet Funktionen, welche die Logik zur Authentifizierung implementieren.
 *
 */

/*
 * Beinhaltet die Anwendungslogik zur Registration
 */
function registration() {
    if (isset($_POST['registrieren'])) {

        
        if(!CheckName($_POST['vorname']) || !CheckName($_POST['nachname']) || !CheckEmailFormat($_POST['email']) || !CheckPasswordFormat($_POST['passwort']))
        {
            echo '<script language="javascript">';
            echo 'alert("Eingaben kontrollieren!")';
            echo '</script>';
            header('Refresh:0');
            return false;
        }
        else
        {
            db_insert_benutzer($_REQUEST);
        }
  }
    // Template abfüllen und Resultat zurückgeben
    setValue( 'phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__ );
    return runTemplate( "../templates/registration.htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zum Login
 */
function login() {
    if(isset($_POST['login'])) {
        $mail = $_POST['benutzername'];
        $_SESSION['benutzerMail'] = $mail;
        $passwort = $_POST['passwort'];
        $sqlmatch = "SELECT email, passwort FROM benutzer WHERE email='".$mail."' AND passwort='".$passwort."'";
        $sqlid = "SELECT bid FROM benutzer WHERE email='".$mail."'";
        $id = sqlSelect($sqlid);
        /*
        * Login Überprüfung
        */
        $sqlpass  ="SELECT passwort FROM benutzer WHERE email='".$mail."'";
        $pass = sqlSelect($sqlpass);
        foreach($pass as $p)
        {
            $sqlpasswort = $p['passwort'];
        }
        
        if(crypt($passwort, $sqlpasswort) != $sqlpasswort || !CheckEmailFormat($_POST['benutzername']) )
        {
            echo '<script language="javascript">';
            echo 'alert("Falsches Login!")';
            echo '</script>';
            header("Refresh:0");
            return false;
        }
        else
        {
            $_SESSION['benutzerId'] = $id[0]["bid"];
            header("Refresh:0");
        }
    }
	// Das Forum wird ohne Angabe der Funktion aufgerufen bzw. es wurde auf die Schaltfläche "abbrechen" geklickt
	setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
	return runTemplate( "../templates/login.htm.php");
}

/*
 * Beinhaltet die Anwendungslogik zum Login
 */
function logout() {
    session_destroy();
    header("Refresh: 0");
}

/*
 * Prüft, ob ein Benutzer angemeldet ist
 */
function angemeldet() {
	if (strlen(getSessionValue("benutzerId")) > 0) return true;
	else return false;
}
?>