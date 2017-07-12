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

$query = "SELECT * FROM user_point WHERE id_facebook='10213427321783189'";
$user_point=$db->query($query);
 $rows = $user_point->fetch_assoc();

var_dump($rows);

echo json_encode($rows);
?>


<html>
<body>
<a href="../logout.php">Logout</a>
</body>
</html>


