<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 24/04/2017
 * Time: 20:18
 */

// avvio la sessione
session_start();

// verifico di aver fatto il login
if (!isset($_SESSION['idUtente']) || !is_numeric($_SESSION ['idUtente']) || $_SESSION['idUtente'] == 0) header("Location: login.php");
?>

<html>

    <meta charset="UTF-8">

    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"
    <link type="text/css" rel="stylesheet" href="utility.css">

    <script src="Jquery-3.2.1.min/jquery-3.2.1.min.js"></script>
    <script src="scriptINDEX.js"></script>

<body>

<div id="tutorial">
    <a id="init_FB" class="waves-effect waves-light btn-large">Provalo!!</a>
</div>

<img id="pic_profile">

</body>
</html>