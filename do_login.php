
<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 24/04/2017
 * Time: 20:22
 */

// avvio la sessione
session_start();
var_dump($_SESSION);
include('config.php');

// verifico di aver fatto il login
if (isset($_SESSION['idFacebook']) && !is_numeric($_SESSION['idFacebook']) && $_SESSION['idFacebook'] != 0){
    ?>
    <script>
        alert("stai già dentro");
        window.location.href = "index.php";
    </script>
<?php

}


echo('start do login');


$email = $_POST['email'];
$cognome =$_POST['cognome'];
$nome = $_POST['nome'];
$idFacebook = $_POST['idFacebook'];
$immagine = $_POST['immagine'];
$user_events = $_POST['event_user'];
$user_tagged_places = $_POST['user_tagged_places'];

$categories = $_POST['categories'];


$_SESSION['idFacebook'] = $idFacebook;
$_SESSION['cognome'] = $cognome;
$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['immagine'] = $_POST['immagine'];
$_SESSION['categories'] = $categories;



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
    $query = "INSERT INTO utenti(email, cognome, nome, id_facebook, immagine) VALUES ('$email', '$cognome', '$nome', '$idFacebook','$immagine')";
    $db->query($query);
    if ($db->errno != 0) { echo "Impossibile registrare il nuovo utente"; exit(); }

    $idUtente = $db->insert_id;
}
else
{
    $rigaUtente = $resUtente->fetch_array();
    $idUtente = $rigaUtente['id'];
}

$totalNumberCategories=0;

foreach ($categories as $single_cat){
    $totalNumberCategories+=$single_cat;
}

$_SESSION['total']=$totalNumberCategories;


for($i=0; $i<8; $i++){
    $categories[$i]= round($categories[$i]/$totalNumberCategories, 5);
}

include_once('Data-collection/capture_joined_event.php');
include_once('Data-collection/capture_tagged_places.php');
include_once('Data-collection/user_point_to_DB.php');
include_once('Data-collection/getEvent.php');
include_once('Data-collection/calcMatchPeople.php');
?>
