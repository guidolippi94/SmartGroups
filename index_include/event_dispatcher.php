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

    foreach ($nearEvent as $item){
        //var_dump($item);
        switch ($item->decode_categoria){
            case $orderedCategories[0]:

                //todo insert in databse id evento e id facebook
                $query="SELECT * FROM event_partecipant WHERE facebook_id = $idFacebook AND event_id = $item->cod_evento ";
                $result=$db->query($query);
                if($result->num_rows ==0){
                    $query="INSERT INTO event_partecipant(facebook_id, event_id) VALUES ('$idFacebook', '$item->cod_evento') ";
                    $db->query($query);
                }
                print_r($item->testo_ita);
                print_r("Indice gradimento calcolato: 99%");

                break;
            case $orderedCategories[1]:
                print_r($item->testo_ita);
                print_r("Indice gradimento calcolato: 87%");
                break;
            case $orderedCategories[2]:
                print_r($item->testo_ita);
                print_r("Indice gradimento calcolato: 75%");
                break;
            case $orderedCategories[3]:
                print_r($item->testo_ita);
                print_r("Indice gradimento calcolato: 63%");
                break;
            case $orderedCategories[4]:
                print_r($item->testo_ita);
                print_r("Indice gradimento calcolato: 51%");
                break;
            case $orderedCategories[5]:
                print_r($item->testo_ita);
                print_r("Indice gradimento calcolato: 39%");
                break;
            case $orderedCategories[6]:
                print_r($item->testo_ita);
                print_r("Indice gradimento calcolato: 27%");
                break;
            case $orderedCategories[7]:
                print_r($item->testo_ita);
                print_r("Indice gradimento calcolato: 15%");
                break;
            default:
                print_r($item->testo_ita);
                print_r("Elemento non categorizzato, indice sconosciuto");
                break;
        }
    }


}
//mettere array di eventi da suggerire in session



//suggestNearAndNowEvent($near_event, $orderedCategories, $id_facebook);
