<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 28/08/2017
 * Time: 17:56
 */

session_start();

include_once("../config.php");

//prendere percentuali interessi persona

//prendere eventi futuri

$idFacebook = $_SESSION['idFacebook'];

$queryDBUsersPoint = "SELECT music, sport, food, travel, fashion, education, entertainment, healtcare FROM user_point WHERE id_facebook = $idFacebook";
$result=$db->query($queryDBUsersPoint);

$userPoint=$result->fetch_assoc();

$bestInterest= arsort($userPoint);

$orderedCategories = array_keys($userPoint);

//var_dump($orderedCategories);

function suggestNearAndNowEvent($nearEvent, $orderedCategories, $idFacebook, $db)
{
    $eventSuggestionList = array();


    foreach ($nearEvent as $item){
        //var_dump($item);

        $eventSuggest = new stdClass();

        switch ($item->decode_categoria){
            case $orderedCategories[0]:
                $eventSuggest=eventItemCreator($idFacebook, $db, $item);
                $eventSuggest->liking="99";
                //var_dump($eventSuggest);
                array_push($eventSuggestionList, $eventSuggest);

                //print_r($eventSuggestionList);
                break;
            case $orderedCategories[1]:
                $eventSuggest=eventItemCreator($idFacebook, $db, $item);
                $eventSuggest->liking="87";

                array_push($eventSuggestionList, $eventSuggest);

                //print_r($eventSuggestionList);
                break;
            case $orderedCategories[2]:
                $eventSuggest=eventItemCreator($idFacebook, $db, $item);
                $eventSuggest->liking="75";

                array_push($eventSuggestionList, $eventSuggest);

                //print_r($eventSuggestionList);
                break;
            case $orderedCategories[3]:
                $eventSuggest=eventItemCreator($idFacebook, $db, $item);
                $eventSuggest->liking="51";

                array_push($eventSuggestionList, $eventSuggest);

                //print_r($eventSuggestionList);
                break;
            case $orderedCategories[5]:
                $eventSuggest=eventItemCreator($idFacebook, $db, $item);
                $eventSuggest->liking="39";

                array_push($eventSuggestionList, $eventSuggest);

                //print_r($eventSuggestionList);
                break;
            case $orderedCategories[6]:
                $eventSuggest=eventItemCreator($idFacebook, $db, $item);
                $eventSuggest->liking="27";

                array_push($eventSuggestionList, $eventSuggest);

                //print_r($eventSuggestionList);
                break;
            case $orderedCategories[7]:
                $eventSuggest=eventItemCreator($idFacebook, $db, $item);
                $eventSuggest->liking="15";

                array_push($eventSuggestionList, $eventSuggest);

                //print_r($eventSuggestionList);
                break;
            default:
                $eventSuggest=eventItemCreator($idFacebook, $db, $item);
                $eventSuggest->liking="Indice sconosciuto";

                array_push($eventSuggestionList, $eventSuggest);

                //print_r($eventSuggestionList);
                break;

        }

    }
    //var_dump($eventSuggestionList);
    //$_SESSION['eventSuggestionList'] += $eventSuggestionList;
    return $eventSuggestionList;
}




function eventItemCreator($idFacebook, $db, $item){
    $eventSuggest = new stdClass();
    $query="SELECT * FROM event_partecipant WHERE facebook_id = $idFacebook AND event_id = $item->cod_evento ";
    $result=$db->query($query);
    if($result->num_rows ==0){
        $query="INSERT INTO event_partecipant(facebook_id, event_id) VALUES ('$idFacebook', '$item->cod_evento') ";
        $db->query($query);
    }
    $query="SELECT facebook_id FROM event_partecipant WHERE facebook_id != $idFacebook AND event_id = $item->cod_evento ";
    $result=$db->query($query);

    $result=$result->fetch_all();

    //var_dump($result);


    //fill di eventSuggest con item e lista di amici fb
    $eventSuggest->item = $item;
    $eventSuggest->idFbList = array();

    foreach ($result as $value){
        array_push($eventSuggest->idFbList, $value[0]);
    }

    return $eventSuggest;

}

//mettere array di eventi da suggerire in session



//suggestNearAndNowEvent($near_event, $orderedCategories, $id_facebook);
/*
                $query="SELECT * FROM event_partecipant WHERE facebook_id = $idFacebook AND event_id = $item->cod_evento ";
                $result=$db->query($query);
                if($result->num_rows ==0){
                    $query="INSERT INTO event_partecipant(facebook_id, event_id) VALUES ('$idFacebook', '$item->cod_evento') ";
                    $db->query($query);
                }
                $query="SELECT facebook_id FROM event_partecipant WHERE facebook_id != $idFacebook AND event_id = $item->cod_evento ";
                $result=$db->query($query);

                $result=$result->fetch_all();


                //fill di eventSuggest con item e lista di amici fb
                $eventSuggest->item = $item;
                $eventSuggest->idFbList = array();

                foreach ($result as $value){
                    array_push($eventSuggest->idFbList, $value[0]);
                }

                var_dump($eventSuggest->idFbList);
                //inserisco in lista di tipo event suggest*/