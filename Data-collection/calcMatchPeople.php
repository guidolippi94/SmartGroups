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
$rows = $user_point->fetch_assoc();

var_dump($rows);
echo json_encode($rows);

$query = "SELECT id_facebook, music, sport, food, travel, fashion, education, entertainment, healtcare FROM user_point";
$user_point=$db->query($query);
$rows2 = $user_point->fetch_all();
foreach ($rows2 as $item){
    if($rows['id_facebook'] != $item[0]){
        var_dump($item);

    }
}

?>


<html>
<body>
<a href="../logout.php">Logout</a>
</body>
</html>


