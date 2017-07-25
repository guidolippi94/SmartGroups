<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 25/07/2017
 * Time: 19:12
 */

include('../config.php');

$eventArray = array();


$queryDBEvent = "SELECT * FROM events";
$result=$db->query($queryDBEvent);

$eventFromDB = [];
while($row = $result->fetch_assoc()){
    $eventFromDB[]=$row;
}


$_SESSION['EventDatabase'] = $eventFromDB;
