<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 18/08/2017
 * Time: 18:39
 */
include_once("config.php");
include_once("Data-collection/distanceCalculator.php");

//include_once("Data-collection/calcMatchPeople.php");


session_start();
/*
prendo evento suggeritomi

faccio lista di persone a cui e suggerito

calcolo distanza e se minore di offset lo suggerisco come amico

*/
$idFacebook = $_SESSION['idFacebook'];
$query = "SELECT event_id FROM event_partecipant WHERE facebook_id = '$idFacebook'";
$result = $db->query($query);

//elenco degli eventi che mi interessano
$myEvent = array();
$myEventList = array();

while($row = $result->fetch_assoc()){
    $myEvent[]=$row;
}

foreach ($myEvent as $item){
    array_push($myEventList, $item);
}

$_SESSION['suggested_events']=$myEventList;

//elenco degli amici interessati ad ogni evento

$friendsOnSingleEvent=array();
$friendEventList = array();


$matchedFriendList = array();//array di oggetti amici che matchano
$matchedFriend = new stdClass();


foreach ($myEventList as $value) {
$eventIdBuffer = $value['event_id'];

//SELEZIONO PARTECIPANTI ALL'EVENTO
    $query = "SELECT facebook_id FROM event_partecipant WHERE event_id = '$eventIdBuffer' AND facebook_id != '$idFacebook'";
    $result = $db->query($query);


    while ($row = $result->fetch_assoc()) {
        $temp = $row['facebook_id'];
        $friendsOnSingleEvent[] = $temp;

    }

    foreach ($friendsOnSingleEvent as $item) {
        $distanceCalculated = calculateDistance($idFacebook, $item, $db);
        //var_dump($distanceCalculated);
        if ($distanceCalculated < 0.29) { //OFFSET DA IMPOSTARE CORRETTAMENTE PER IL MATCH
            //aggiungo utente con dati all'elenco delle visualizzazioni
            $matchedFriend->eventId = $eventIdBuffer;
            $matchedFriend->distance = $distanceCalculated;
            $matchedFriend->facebookId = $item;
            array_push($matchedFriendList, $matchedFriend);
        }
    }

//var_dump($friendsOnSingleEvent);
}

var_dump($matchedFriendList);

?>

<html>
<body>
<p1>Friend suggest</p1>
<a href="index.php">Index</a>
</body>
</html>
