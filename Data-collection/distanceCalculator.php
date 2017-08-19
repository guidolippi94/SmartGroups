<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 05/07/2017
 * Time: 16:23
 */

session_start();
include_once('../config.php');

function calculateDistance($myFacebookId, $friendFacebookId, $databaseConnection){

    //prendo il mio punto
    $query = "SELECT * FROM user_point WHERE id_facebook='$myFacebookId'";
    $user_point=$databaseConnection->query($query);
    $currentPerson = $user_point->fetch_assoc();

    //prendo punto dell'amico

    $query = "SELECT * FROM user_point WHERE id_facebook='$friendFacebookId'";
    $user_point=$databaseConnection->query($query);
    $personFromDB = $user_point->fetch_assoc();


    $total=0;
    $total += pow($currentPerson['music']-$personFromDB['music'], 2);
    $total += pow($currentPerson['sport']-$personFromDB['sport'], 2);
    $total += pow($currentPerson['food']-$personFromDB['food'], 2);
    $total += pow($currentPerson['travel']-$personFromDB['travel'], 2);
    $total += pow($currentPerson['fashion']-$personFromDB['fashion'], 2);
    $total += pow($currentPerson['education']-$personFromDB['education'], 2);
    $total += pow($currentPerson['entertainment']-$personFromDB['entertainment'], 2);
    $total += pow($currentPerson['healtcare']-$personFromDB['healtcare'], 2);

    $total = pow($total, 0.5);

    return $total;
}




