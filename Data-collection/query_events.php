<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 26/07/2017
 * Time: 12:01
 */

$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "test";


$db = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
if ($db->connect_errno) { echo "Impossibile collegarsi al database"; exit(); }


$query =" SELECT joined_events.event_name, joined_events.place_name, joined_events.event_date, joined_events.start_time, joined_events.rspv_status
          FROM joined_events, table_connection
          WHERE joined_events.event_id = table_connection.joined_events AND table_connection.id_facebook = '$id_facebook'";

if ($db->errno != 0) { echo "Impossibile caricare gli eventi, riprovare più tardi"; exit();}

$resEvents = $db->query($query);
$resEvents = $resEvents->fetch_all();