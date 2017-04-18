<?php
/**
 * Created by PhpStorm.
 * User: Alessandro
 * Date: 12/04/2017
 * Time: 17:19
 */

$my_host = '79.28.189.230';
$my_username = 'root';
$my_password = 'root';
$my_dbname = 'events';

$mysqli = new mysqli($my_host, $my_username, $my_password, $my_dbname);
if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
} else {
    echo 'Connesso. ' . $mysqli->host_info . "\n";
}
