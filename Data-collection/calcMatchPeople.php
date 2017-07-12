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

$query = "SELECT * FROM user_point";
$user_point = $db->query($query);
var_dump($user_point);


