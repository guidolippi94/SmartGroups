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

$id_facebook = $_SESSION['idFacebook'];


// verifico di aver fatto il login
if (!isset($_SESSION['idFacebook']) || !is_numeric($_SESSION['idFacebook']) || $_SESSION['idFacebook'] == 0) {
    ?>
    <script>window.location = "login.php";</script>
    <?php
}

include ('Data-collection/query_events.php');



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
    <link rel="stylesheet" type="text/css" href="style/calendar-style.css" />

    <script src="js/snap.svg-min.js"></script>
    <script src="Jquery-3.2.1.min/jquery-3.2.1.min.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">

    <!-- dovrebbe venire fuori quello laterale -->
    <div class="menu-wrap">
        <nav class="menu">
            <div class="profile">
                <img id="pic_profile" src="<?php echo $_SESSION['immagine'] ?>">
                <span id="nome-cognome"> <br> <?php echo $_SESSION['nome']; echo " "; echo $_SESSION['cognome'] ?> </span>
            </div>

            <div class="icon-list">
                <a href="#"><i class="fa fa-fw fa-star-o" id="icon"></i><span>Favorites</span></a>
                <a href="#"><i class="fa fa-fw fa-bell-o" id="icon"></i><span>Notifiche</span></a>
                <a href="#"><i class="fa fa-fw fa-envelope-o" id="icon"></i><span>Messages</span></a>
                <a href="#"><i class="fa fa-fw fa-comment-o" id="icon"></i><span>Comments</span></a>
                <a href="http://localhost/SmartG/logout.php"><i class="fa fa-fw fa-undo" id="icon"></i><span>Logout</span></a>
                <a href="#"><i class="fa fa-fw fa-newspaper-o" id="icon"></i><span>Reading List</span></a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
        <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
                <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
            </svg>
        </div>
    </div>
    <button class="menu-button" id="open-button"></button>
    <div class="content-wrap">
        <div class="top-site">
            <div style="width:100%; height: 7px"></div>
            <div class="top-site-end">
                <p> <b>SMART GROUPS </b></p>
            </div>
            <div style="height: 62px"></div>
            <div class="calendar">
                <div class="month">
                    <ul>
                        <li class="prev">&#10094;</li>
                        <li class="next">&#10095;</li>
                        <li style="text-align:center">
                            August<br>
                            <span style="font-size:18px">2016</span>
                        </li>
                    </ul>
                </div>

                <ul class="weekdays">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                </ul>

                <ul class="days">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li>8</li>
                    <li>9</li>
                    <li><span class="active">10</span></li>
                    <li>11</li>
                    <li>12</li>
                    <li>13</li>
                    <li>14</li>
                    <li>15</li>
                    <li>16</li>
                    <li>17</li>
                    <li>18</li>
                    <li>19</li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li>30</li>
                    <li>31</li>
                </ul>
            </div>
        </div>
        <!-- <div class="today-event" id="today"></div> -->

    </div>
</div><!-- /container -->



<script src="scriptINDEX.js"></script>
<script src="js/classie.js"></script>
<script src="js/main3.js"></script>
</body>
</html>