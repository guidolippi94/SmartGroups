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


$my_eventsANDsuggested = $_SESSION['suggested_events'];  //non so perché ma va bene '0'
//var_dump($my_eventsANDsuggested[$indice_1][0]);
$id_facebook = $_SESSION['idFacebook'];

$cod = $my_eventsANDsuggested[$indice_1][$indice_2]->item->cod_evento; //sono il numero di eventi suggeriti per un mio evento
$cod = str_replace("'", " ", $cod);
//var_dump($cod);
$name = $my_eventsANDsuggested[$indice_1][$indice_2]->item->titolo_ita;
$name = str_replace("'", " ", $name);
//echo $name;
$text = $my_eventsANDsuggested[$indice_1][$indice_2]->item->testo_ita;
$text = str_replace("'", " ", $text);
//echo $text;
$date = $my_eventsANDsuggested[$indice_1][$indice_2]->item->data_to;
$date = str_replace("'", " ", $date);
//echo $date;
$schedule = $my_eventsANDsuggested[$indice_1][$indice_2]->item->orario;
$schedule = str_replace("'", " ", $schedule);
//echo $schedule;
$affinity = $my_eventsANDsuggested[$indice_1][$indice_2]->liking;
//echo $sffinity;

$query = "SELECT * FROM suggested_events WHERE id_evento='$cod' AND id_facebook='$id_facebook'";
$res = $db->query($query);
if ($db->errno != 0) { echo "Impossibile caricare gli eventi"; exit(); }

if($res->num_rows == 0){
    $query = "INSERT INTO suggested_events(id_evento, id_facebook, nome_evento, testo_ita, data_evento, orario, affinità) VALUES ('$cod', '$id_facebook','$name','$text','$date','$schedule','$affinity')";
    $db->query($query);

    if ($db->errno != 0) { echo "Impossibile registrare il nuovo evento"; exit(); }
}
else{
    $query = "DELETE FROM suggested_events WHERE id_evento='$cod' AND id_facebook='$id_facebook'";
    $db->query($query);
    if ($db->errno != 0) { echo "Impossibile eliminare l'evento"; exit(); }
}

$query = "SELECT * FROM suggested_events WHERE id_facebook='$id_facebook'";
$response = $db->query($query);
if ($db->errno != 0) { echo "Impossibile caricare tutti gli eventi"; exit(); }

//var_dump($response->fetch_all());

$tmp = $response->fetch_all();

//var_dump($tmp);
echo(json_encode($tmp));
