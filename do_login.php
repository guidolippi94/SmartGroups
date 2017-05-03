<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 24/04/2017
 * Time: 20:22
 */

// avvio la sessione
session_start();

// verifico di aver fatto il login
if (isset($_SESSION['idUtente']) && !is_numeric($_SESSION['idUtente']) && $_SESSION['idUtente'] != 0) header("Location: index.php");

// avvio una connessione con il database MySQL
$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "test";

$db = new mysqli("$dbServer", "$dbUser", "$dbPassword", "$dbName");
if ($db->connect_errno) { echo "Impossibile collegarsi al database"; exit(); }

// decodifico i dati
$parametri = json_decode(base64_decode($_GET['p']), true);

// tutti i parametri devono essere formattati per evitare attacchi di tipo SQL injection
$email = $db->real_escape_string($parametri['email']);
$cognome = $db->real_escape_string($parametri['cognome']);
$nome = $db->real_escape_string($parametri['nome']);
$idFacebook = $db->real_escape_string($parametri['idFacebook']);
$immagine = $db->real_escape_string($parametri['immagine']);
$tag = $db->real_escape_string($parametri['tag']);

// ora verifico se l'utente è registrato oppure no
$query = "SELECT * FROM utenti WHERE email = '$email' AND id_facebook = '$idFacebook'";
$resUtente = $db->query($query);
if ($db->errno != 0) { echo "Impossibile caricare gli utenti"; exit(); }

if ($resUtente->num_rows == 0)
{
    // in questo caso l'utente non è registrato, lo registro quindi
    $query = "INSERT INTO utenti(email, cognome, nome, id_facebook, immagine) VALUES('$email', '$cognome', '$nome', '$idFacebook','$immagine')";
    $db->query($query);
    if ($db->errno != 0) { echo "Impossibile registrare il nuovo utente"; exit(); }

    $idUtente = $db->insert_id;
}
else
{
    $rigaUtente = $resUtente->fetch_array();
    $idUtente = $rigaUtente['id'];
}

// a questo punto inizializzo la sessione
$_SESSION['idUtente'] = $idUtente;
$_SESSION['idFacebook'] = $idFacebook;
$_SESSION['cognome'] = $parametri['cognome'];
$_SESSION['nome'] = $parametri['nome'];
$_SESSION['email'] = $parametri['email'];
$_SESSION['immagine'] = $parametri['immagine'];
$_SESSION['tag'] = $parametri['tag'];

header("Location: index.php");

?>