<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 12/05/2017
 * Time: 11:57
 */

// avvio una connessione con il database MySQL
$dbServer = "localhost";
$dbUser = "testppm";
$dbPassword = "ppm2017";
$dbName = "testppm";


$db = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
if ($db->connect_errno) { echo "Impossibile collegarsi al database"; exit(); }