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


<body>
<p>
    Questo sarà la pagina del profilo utente
</p>
</body>
</html>