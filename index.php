<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 24/04/2017
 * Time: 20:18
 */

// avvio la sessione
session_start();
//var_dump($_SESSION);

// verifico di aver fatto il login
if (!isset($_SESSION['idFacebook']) || !is_numeric($_SESSION ['idFacebook']) || $_SESSION['idFacebook'] == 0) {
    ?>
    <script>window.location = "login.php";</script>
    <?php
}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/normalize.css" />
    <link rel="stylesheet" type="text/css" href="style/demo.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="style/index_style.css" />
    <script src="js/snap.svg-min.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="menu-wrap">
        <nav class="menu">
            <div class="icon-list">
                <a href="#"><i class="fa fa-fw fa-star-o"></i><span>Favorites</span></a>
                <a href="#"><i class="fa fa-fw fa-bell-o"></i><span>Alerts</span></a>
                <a href="#"><i class="fa fa-fw fa-envelope-o"></i><span>Messages</span></a>
                <a href="#"><i class="fa fa-fw fa-comment-o"></i><span>Comments</span></a>
                <a href="http://localhost/SmartG/logout.php"><i class="fa fa-fw fa-bar-chart-o"></i><span>Logout</span></a>
                <a href="#"><i class="fa fa-fw fa-newspaper-o"></i><span>Reading List</span></a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
        <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
                <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
            </svg>
        </div>
    </div>
    <button class="menu-button" id="open-button">Open Menu</button>
    <div class="content-wrap">
        <div class="content">
            cazzzoooo <br> cazzo <br>
            cazzzoooo <br> cazzo <br>
            cazzzoooo <br> cazzo <br>               <!-- i cazzi son di prova e preciso va sopra il pulsante -->
            cazzzoooo <br> cazzo <br>
            cazzzoooo <br> cazzo <br>
        </div>
    </div>

</div><!-- /container -->
<script src="js/classie.js"></script>
<script src="js/main3.js"></script>
</body>
</html>