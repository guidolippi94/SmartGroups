<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 05/07/2017
 * Time: 16:23
 */

session_start();
include('../config.php');

$idF = $_SESSION['idFacebook'];

$query = "SELECT * FROM user_point WHERE id_facebook='$idF'";
$user_point=$db->query($query);
$currentPerson = $user_point->fetch_assoc();

function personMatchDistance($currentPerson, $personFromDB){
    $total=0;
    $total += pow($currentPerson['music']-$personFromDB[1], 2);
    $total += pow($currentPerson['sport']-$personFromDB[2], 2);
    $total += pow($currentPerson['food']-$personFromDB[3], 2);
    $total += pow($currentPerson['travel']-$personFromDB[4], 2);
    $total += pow($currentPerson['fashion']-$personFromDB[5], 2);
    $total += pow($currentPerson['education']-$personFromDB[6], 2);
    $total += pow($currentPerson['entertainment']-$personFromDB[7], 2);
    $total += pow($currentPerson['healtcare']-$personFromDB[8], 2);

    $total = pow($total, 0.5);

    return $total;
}


$matchArray = array();


$queryDBUsersPoint = "SELECT id_facebook, music, sport, food, travel, fashion, education, entertainment, healtcare FROM user_point";
$result=$db->query($queryDBUsersPoint);

$personFromDB = [];
while($row = $result->fetch_assoc()){
    $personFromDB[]=$row;
/*    echo "Row print : ";
    var_dump($row);*/
}


foreach ($personFromDB as $item){
    if($currentPerson['id_facebook'] != $item[0]){
        array_push($matchArray, personMatchDistance($currentPerson, $item));
    }
}

$_SESSION['calculated_distance'] = $matchArray;

var_dump($matchArray);

?>


<html>
<body>
<a href="../logout.php">Logout</a>
</body>
</html>


