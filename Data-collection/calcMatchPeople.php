<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 05/07/2017
 * Time: 16:23
 */

session_start();
include('../config.php');

echo "nome: ".$_SESSION['nome'];

$query = "SELECT * FROM user_point WHERE idFacebook='10213427321783189'";
$db->query($query);
$user_point = $db->mysqli_query($query);

var_dump($user_point);

echo json_encode($user_point);
?>


<html>
<body>
<a href="../logout.php">Logout</a>
</body>
</html>


