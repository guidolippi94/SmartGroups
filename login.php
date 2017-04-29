<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 24/04/2017
 * Time: 20:20
 */

// avvio la sessione
session_start();

// verifico di aver fatto il login
if (isset($_SESSION['idUtente']) && is_numeric($_SESSION['idUtente']) && $_SESSION['idUtente'] != 0) header("Location: index.php");
?>
<html>
<head>

    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="img">
    <link type="text/css" rel="stylesheet" href="utility.css">
    <link type="text/css" rel="stylesheet" href="login_style.css">
    <link type="text/css" rel="stylesheet" href="general_style.css">


    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-social-gh-pages/bootstrap-social.css">

    <script src="Jquery-3.2.1.min/jquery-3.2.1.min.js"></script>
    <script src="scriptFB.js"></script>

</head>
<body>
<div class="wrapper, parallasse" id="login_wrapper">

    <a onclick="loginFacebook()" class="btn btn-social btn-lg btn-facebook" id="login_button_facebook">
        <span class="fa fa-facebook"></span> Accedi a Facebook
    </a>


</div>



</body>
</html>