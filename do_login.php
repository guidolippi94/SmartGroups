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


// a questo punto inizializzo la sessione
$_SESSION['idFacebook'] = $idFacebook;
$_SESSION['cognome'] = $cognome;
$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['immagine'] = $immagine;
//$_SESSION['event'] = $user_events;
//$_SESSION['tagged_places'] = $user_tagged_places['name'];
//$_SESSION['parsed_place'] = $user_tagged_places[0]['place']['location']['city'];


$_SESSION['single__event'] = $user_events[0]['place']['name'];

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
//include_once ('capture_joined_events.php');


/*
foreach ($user_events as $single_event){
    // $single_place = $user_tagged_places[1];

    $single_event_id = $single_event[0]['id'];
    $query_event = "SELECT * FROM joined_events WHERE event_id = '$single_event_id'";

    $res_single_event = $db->query($query_event);

    if ($db->errno != 0) {
        echo "Impossibile caricare joined_event";
        exit();
    }

    if ($res_single_event->num_rows == 0) {
        //caso in cui il luogo non è mai stato registrato


        $event_name = $single_event[0]['name'];
        $place_name = $single_event[0]['place']['name'];
        $event_date = $single_event[0]['start_time'];
        $city = $single_event[0]['place']['location']['city'];
        $country = $single_event[0]['place']['location']['country'];
        $street = $single_event[0]['place']['location']['street'];

        //TODO aggiungere tag_date parasata correttamente nell'insert into del db (per ora il campo è text ma andrà messo date)


        $query_event = "INSERT INTO joined_events(event_name, place_name, city, country, street, event_date, event_id) VALUES('$event_name','$place_name', '$city', '$country', '$street', '$event_date', '$single_event_id')";
        $db->query($query_event);

        if ($db->errno != 0) {
            echo "Impossibile inserire parametri in joined_event";
            exit();
        }

        //TODO fare inserimento nella tabella table connection
    } else {
        //TODO fare solamente inserimento nella tabella table connection, poichè il luogo è già registrato e va asseganto all'utente
    }
}*/
?>
