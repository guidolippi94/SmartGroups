<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 04/09/17
 * Time: 11.17
 */

$query = "SELECT * FROM suggested_events WHERE id_facebook='$id_facebook'";
$response = $db->query($query);
if ($db->errno != 0) { echo "Impossibile caricare tutti gli eventi"; exit(); }

//var_dump($response->fetch_all());

$sugg = $response->fetch_all();

//var_dump($tmp[0][0]);