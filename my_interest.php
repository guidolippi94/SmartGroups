<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 02/09/17
 * Time: 13.34
 */


session_start();
//var_dump($_SESSION);
/*
//verifico di aver fatto il login
if (isset($_SESSION['idFacebook']) && !is_numeric($_SESSION['idFacebook']) && $_SESSION['idFacebook'] != 0){
    ?>
    <script>
        alert("stai già dentro");
        window.location.href = "index.php";
    </script>
    <?php

}*/
include_once ('config.php');



$indice_1 = $_POST['m_event'];
$indice_2 = $_POST['s_event'];
$my_eventsANDsuggested = $_SESSION['suggested_events'][0];  //non so perché ma va bene '0'
//var_dump($my_eventsANDsuggested);
$id_facebook = $_SESSION['idFacebook'];
//var_dump($my_eventsANDsuggested[0]);    //sono il numero di miei eventi
$cod = $my_eventsANDsuggested[$indice_1][$indice_2]->item->cod_evento; //sono il numero di eventi suggeriti per un mio evento
$name = $my_eventsANDsuggested[$indice_1][$indice_2]->item->titolo_ita;
$text = $my_eventsANDsuggested[$indice_1][$indice_2]->item->testo_ita;
$date = $my_eventsANDsuggested[$indice_1][$indice_2]->item->data_to;
$schedule = $my_eventsANDsuggested[$indice_1][$indice_2]->item->orario;

$query = "SELECT * FROM suggested_events WHERE id_evento='$cod' AND id_facebook='$id_facebook'";
$res = $db->query($query);
if ($db->errno != 0) { echo "Impossibile caricare gli eventi"; exit(); }

if($res->num_rows == 0){
    $query = "INSERT INTO suggested_events(id_evento, id_facebook, nome_evento, testo_ita, data_evento, orario) VALUES ('$cod', '$id_facebook','$name','$text','$date','$schedule')";
    $db->query($query);
    if ($db->errno != 0) { echo "Impossibile registrare il nuovo evento"; exit(); }
}
else{
    $query = "DELETE FROM suggested_events WHERE id_evento='$giulia' AND id_facebook='$id_facebook'";
    $db->query($query);
    if ($db->errno != 0) { echo "Impossibile eliminare l'evento"; exit(); }
}

$query = "SELECT * FROM suggested_events WHERE id_facebook='$id_facebook'";
$response = $db->query($query);
if ($db->errno != 0) { echo "Impossibile caricare tutti gli eventi"; exit(); }

//var_dump($response->fetch_all());

$tmp = array_keys($response->fetch_assoc());

echo($tmp);