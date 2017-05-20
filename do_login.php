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
if (isset($_SESSION['idFacebook']) && !is_numeric($_SESSION['idFacebook']) && $_SESSION['idFaceook'] != 0){
    ?>
    <script>
        window.location = "index.php";
    </script>
<?php

}

include_once('config.php');

$email = $_POST['email'];
$cognome =$_POST['cognome'];
$nome = $_POST['nome'];
$idFacebook = $_POST['idFacebook'];
$immagine = $_POST['immagine'];
$user_events = $_POST['event_user'];
$user_tagged_places = $_POST['user_tagged_places'];



$_SESSION['parsed_place'] = $user_tagged_places[0]['place']['location']['city'];


// a questo punto inizializzo la sessione
$_SESSION['idFacebook'] = $idFacebook;
$_SESSION['cognome'] = $cognome;
$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['immagine'] = $immagine;
//$_SESSION['event'] = $user_events;
$_SESSION['tagged_places'] = $user_tagged_places;



// tutti i parametri devono essere formattati per evitare attacchi di tipo SQL injection
$email = $db->real_escape_string($email);
$cognome = $db->real_escape_string($cognome);
$nome = $db->real_escape_string($nome);
$idFacebook = $db->real_escape_string($idFacebook);
$immagine = $db->real_escape_string($immagine);

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

include_once('capture_tagged_place.php');

?>
