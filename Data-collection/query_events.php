<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 26/07/2017
 * Time: 12:01
 */


$query =" SELECT DISTINCT joined_events.event_name, joined_events.place_name, joined_events.event_date, joined_events.start_time, joined_events.rspv_status
          FROM joined_events, table_connection
          WHERE joined_events.event_id = table_connection.joined_events AND table_connection.id_facebook = '$id_facebook' AND joined_events.id_facebook = '$id_facebook'";

if ($db->errno != 0) { echo "Impossibile caricare gli eventi, riprovare più tardi"; exit();}

//var_dump($databaseConnection);
$resEvents = $db->query($query);
$resEvents = $resEvents->fetch_all();