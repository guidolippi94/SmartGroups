<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 17/08/2017
 * Time: 22:00
 */
session_start();

include_once("config.php");

//prendere percentuali interessi persona

//prendere eventi futuri

$idFacebook = $_SESSION['idFacebook'];

$queryDBUsersPoint = "SELECT music, sport, food, travel, fashion, education, entertainment, healtcare FROM user_point WHERE id_facebook = $idFacebook";
$result=$db->query($queryDBUsersPoint);
$userPoint=$result->fetch_assoc();

$bestInterest= arsort($userPoint);

$orderedCategories = array_keys($userPoint);

//rimuovo dalla tabella degli eventi suggeriti per aggiornarli con nuovi o di altre categorie che hanno più peso di altre
$queryClearMyEvent =  "DELETE  FROM event_partecipant WHERE facebook_id = '$idFacebook'";
$resultCleaning = $db->query($queryClearMyEvent);

//Categroy 1
$queryEventByCategory = "SELECT * FROM events WHERE category = '$orderedCategories[0]'";
$result=$db->query($queryEventByCategory);

$eventListCategory1 = [];
$eventFromDB = [];


while($row = $result->fetch_assoc()){
    $eventFromDB[]=$row;
}

foreach ($eventFromDB as $item){
     array_push($eventListCategory1, $item);
     $actualEventId = $item['id'];
     $queryJoiningEvent= "INSERT INTO event_partecipant(event_id, facebook_id) VALUES ('$actualEventId', '$idFacebook')";
     $resultInsert=$db->query($queryJoiningEvent);

}

//var_dump($eventListCategory1);

//Categroy 2
$queryEventByCategory = "SELECT * FROM events WHERE category = '$orderedCategories[1]'";
$result=$db->query($queryEventByCategory);

$eventListCategory2 = [];
$eventFromDB = [];


while($row = $result->fetch_assoc()){
    $eventFromDB[]=$row;
}
foreach ($eventFromDB as $item){
    array_push($eventListCategory2, $item);
    $actualEventId = $item['id'];
    $queryJoiningEvent= "INSERT INTO event_partecipant(event_id, facebook_id) VALUES ('$actualEventId', '$idFacebook')";
    $resultInsert=$db->query($queryJoiningEvent);
}

//var_dump($eventListCategory2);



//Categroy 3
$queryEventByCategory = "SELECT * FROM events WHERE category = '$orderedCategories[2]'";
$result=$db->query($queryEventByCategory);

$eventListCategory3 = [];
$eventFromDB = [];


while($row = $result->fetch_assoc()){
    $eventFromDB[]=$row;
}
foreach ($eventFromDB as $item){
    array_push($eventListCategory3, $item);
    $actualEventId = $item['id'];
    $queryJoiningEvent= "INSERT INTO event_partecipant(event_id, facebook_id) VALUES ('$actualEventId', '$idFacebook')";
    $resultInsert=$db->query($queryJoiningEvent);
}

//var_dump($eventListCategory3);



//todo effettuare controllo sulla data dell'evento e rimuoverlo se è già passato



?>

<html>
<body>
<a href="index.php">Index</a>
</body>
</html>

