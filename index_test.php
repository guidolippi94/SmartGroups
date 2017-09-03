<?php
/*session_start();


// verifico di aver fatto il login
if (!isset($_SESSION['idFacebook']) || !is_numeric($_SESSION['idFacebook']) || $_SESSION['idFacebook'] == 0) {
    */?><!--
    <script>window.location = "login.php";</script>
    <?php
/*}

$id_facebook = $_SESSION['idFacebook'];
include ('config.php');
include ('Data-collection/query_events.php');
include('index_include/choice_image.php');
include ('index_include/neaby_events.php');
include ('index_include/our_category.php');
include ('index_include/event_dispatcher.php');
$today = new DateTime("now");

*/?>

<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript"></script>

    <style>
        .event{
            width: 215px;
            height: 195px;
            background-color: blue;
        }


    </style>
</head>
<body>
<div class="event">

</div>
</body>
</html>-->

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
include ('config.php');
include ('Data-collection/query_events.php');
include('index_include/choice_image.php');
include ('index_include/neaby_events.php');
include ('index_include/our_category.php');
include ('index_include/event_dispatcher.php');
$today = new DateTime("now");
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="shortcut icon" href="../favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="style/normalize.css" />
    <link rel="stylesheet" type="text/css" href="style/demo.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="style/calendar-style.css" />
    <link rel="stylesheet" type="text/css" href="style/event-table.css" />




    <script src="js/snap.svg-min.js"></script>
    <script src="Jquery-3.2.1.min/jquery-3.2.1.min.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <style>
        #icon{
            font-size: 20px;
        }

        #pic_profile {
            border-radius: 50% ;
            width: 70px;
            height: 70px;
            background:#FFCC00;
        }

        #nome-cognome{
            text-emphasis-color: black;
            text-shadow: 0 1px black, 1px 0 black
        }


        html,
        body,
        .container,
        .content-wrap {
            overflow: hidden;
            width: 100%;
            height: 100%;
        }

        .container {
            background: #1abc9c;
            height: inherit;
        }

        .menu-wrap a {
            /* color: #b8b7ad; */      <!-- Questo comando colora le scritte -->
        }

        .menu-wrap a:hover,
        .menu-wrap a:focus {
            color: #c94e50;
        }

        .content-wrap {
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
            -webkit-transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
        }

        .top-site{
            height: 75px;
        }

        .top-site-end{
            width: 245px;
            height: 75px;
            float: right;
        }
        .top-site-end p{
            text-align: right;
            font-size: 26px;
            border-left: 5px solid #ff0;
            border-top: 5px solid #ffcc00;
            border-radius: 3%;
            padding-right: 5px;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
            /* background: rgb(180, 186, 210); */
        }

        /* Menu Button */
        .menu-button {
            position: fixed;
            z-index: 1000;
            margin: 0.75em;
            padding: 0;
            width: 2.5em;
            height: 2.25em;
            border: none;
            text-indent: 2.5em;
            font-size: 1.5em;
            color: transparent;
            background: transparent;
        }

        .menu-button::before {
            position: absolute;
            top: 0.5em;
            right: 0.5em;
            bottom: 0.5em;
            left: 0.5em;
            background: linear-gradient(#373a47 20%, transparent 20%, transparent 40%, #373a47 40%, #373a47 60%, transparent 60%, transparent 80%, #373a47 80%);
            content: '';
        }

        .menu-button:hover {
            opacity: 0.6;
        }

        /* Close Button */
        .close-button {
            width: 16px;
            height: 16px;
            position: absolute;
            right: 1em;
            top: 1em;
            overflow: hidden;
            text-indent: 16px;
            border: none;
            z-index: 1001;
            background: transparent;
            color: transparent;
        }

        .close-button::before,
        .close-button::after {
            content: '';
            position: absolute;
            width: 2px;
            height: 100%;
            top: 0;
            left: 50%;
            background: #95a5a6;
        }

        .close-button::before {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .close-button::after {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        /* Menu */
        .menu-wrap {
            position: absolute;
            z-index: 1001;
            width: 300px;
            height: 100%;
            font-size: 1.15em;
            -webkit-transform: translate3d(-300px,0,0);
            transform: translate3d(-300px,0,0);
            -webkit-transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
        }

        .menu {
            background: aliceblue;
            width: calc(100% - 120px);
            height: 100%;
            padding: 2em 1em;
        }

        .profile{
            display: inline-block;
            padding: 8px 10px;
            width: 100%;
            text-align: center;
        }


        .icon-list {
            width: 280px;
            line-height: 20px;
        }

        .icon-list a {
            display: block;
            padding: 0.8em;
        }
        .icon-list div {
            display: block;
            padding: 0.8em;
        }

        .icon-list a i {
            opacity: 0.8;
        }

        .icon-list a span {
            margin-left: 12px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 0.87em;
        }

        /* Morph Shape */
        .morph-shape {
            position: absolute;
            width: 120px;
            height: 100%;
            top: 0;
            right: 0;
            fill: aliceblue;
            z-index: 1000;
        }

        /* Shown menu */
        .show-menu .menu-wrap {
            -webkit-transform: translate3d(0,0,0);
            transform: translate3d(0,0,0);
        }

        .show-menu .content-wrap {
            -webkit-transition-delay: 0.1s;
            transition-delay: 0.1s;
            -webkit-transform: translate3d(100px,0,0);
            transform: translate3d(100px,0,0);
        }

        .show-menu .content::before {
            opacity: 1;
            -webkit-transition: opacity 0.3s;
            transition: opacity 0.3s;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .eventWrapperTitle{
            text-align: center;
        }


        .suggestEventWrapper{
            background-color: rgba(255,255,255,0.5);
            height: 400px;
            min-width: 100%;
            text-align: center;
        }

        .myEvent{
            min-height: 300px;
            min-width: 30%;
            border: 2px solid black;
            display: inline-block;
            margin-top: 1%;
            margin-left: 4%;
            float: left;
        }

        .preEvent{
            min-height: 300px;
            min-width: 30%;
            border: 2px solid black;
            display: inline-block;
            margin-top: 1%;
            margin-left: 1%;
            float: left;
            /*background: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.6)), url('../img/head_eventi.jpg') no-repeat center;*/
            -webkit-background-size: contain;
            background-size: cover;
        }

        .postEvent{
            min-height: 195px;
            min-width: 215px;
            border: 2px solid black;
            display: inline-block;
            margin-top: 1%;
            margin-right: 1%;
            float: right;
            background: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.6)), no-repeat, url('/img/login_background.jpg');
            -webkit-background-size: contain;
            background-size: cover;
        }

        #pic_event {
            border-radius: 50% ;
            width: 100px;
            height: 100px;
            background:#FFCC00;
            float: left;
            margin-left: 40%;
            margin-top: 0.5%;
            border: solid greenyellow 5px;
        }

        .infoMyEvent{
            display: inline-block;
        }

        .shortEventInfo{
            color: black;
            font-size: small;
        }
        .shortEventName{

            color: black;
            font-size: medium;
        }
        .infoEventContainer{
            background-color: rgba(255,255,255,0.8);
            width: 350px;
            height: 75px;
            margin: 10px 10px 10px 10px;
        }




        @media all and (max-width: 768px), only screen and (-webkit-min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min--moz-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (-o-min-device-pixel-ratio: 2/1) and (max-width: 1024px), only screen and (min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min-resolution: 192dpi) and (max-width: 1024px), only screen and (min-resolution: 2dppx) and (max-width: 1024px) {
            .suggestEventWrapper{
                background-color: rgba(255,255,255,0.5);
                height: 200px;
                width: 1000px;
            }

            .generalEvent{
                width: 300px;
                height: 150px;
                margin: 20px 10px;
                display: inline;
                background-color: red;
            }

            .myEvent{
                border: 2px solid black;
            }

            .preEvent{
                background: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.6)), url('../img/head_eventi.jpg') no-repeat center;
                -webkit-background-size: contain;
                background-size: cover;
            }

            .postEvent{
                background: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.6)), no-repeat, url('../img/login_background.jpg');
                -webkit-background-size: contain;
                background-size: cover;
            }



            .scrolly{
                overflow: auto;
                overflow-y: hidden;
                margin: 0 auto;
                white-space: nowrap;
            }


        }
    </style>
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
                <!--<a href="#"><i class="fa fa-fw fa-star-o" id="icon"></i><span>Favorites</span></a> -->
                <a href="#"><i class="fa fa-fw fa-bell-o" id="icon"></i><span>Notifiche</span></a>
                <!-- <a href="#"><i class="fa fa-fw fa-envelope-o" id="icon"></i><span>Messages</span></a> -->
                <a href="#"><i class="fa fa-fw fa-calendar-check-o" id="icon"></i><span class="show-events" id="close-button">All Events</span></a>
                <a href="logout.php"><i class="fa fa-fw fa-undo" id="icon"></i><span>Logout</span></a>
                <!--<a href="#"><i class="fa fa-fw fa-newspaper-o" id="icon"></i><span>Reading List</span></a>-->
            </div>
        </nav>
        <button class="close-button" id="close-button"></button>
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
                <img src="img/smartGroupLogo.png" style="height: 100px; width: auto">
            </div>
            <div style="height: 62px"></div>

            <!--<div class="calendar">
                <div class="month" id="month">
                    <ul>
                        <li class="prev" id="prev">&#10094;</li>
                        <li class="next" id="next">&#10095;</li>
                        <li style="text-align:center" id="month_name">
                            <span id="year_number"></span>
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



                <ul class="days" id="days">
                </ul>
            </div>-->

            <h2 class="eventWrapperTitle" style="color: white; margin-top: 50px;">Eventi suggeriti</h2>

            <?php
            $query="SELECT event_name, start_time, street, picture, cover, latitude, longitude, event_date FROM joined_events WHERE id_facebook = '$id_facebook'";
            $result=$db->query($query);
            $tmp=$result->fetch_all();


            foreach ($tmp as $item) {

                $my_data = new DateTime($item[7]);
                $my_lat = $item[5];
                $my_lon = $item[6];
                $my_data_string = $item[7];

                $intervallo = date_diff( $today, $my_data);
                if($intervallo->invert == 0){
                    //se è 0 vuol dire che il più piccolo è oggi



                    // TODO il near_event è il tuo array.
                    $near_event = nearby_events($my_lat, $my_lon, $my_data_string, $json_file);
                    //var_dump($near_event);
                    //suggestNearAndNowEvent($near_event, $orderedCategories, $id_facebook, $db);
                    ?>

                    <div class="suggestEventWrapper scrolly">


                        <div class="preEvent" style="background: url('<?php choise($category)?>')">
                            <img src="">

                        </div>



                        <div class="myEvent" style="background: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.6)), url('<?php  echo $item[4]?>') no-repeat center; -webkit-background-size: contain;
                                background-size: cover;
                                ">
                            <img id="pic_event" src="<?php echo($item[4]) ?>">   <!-- Picture -->

                            <div class="infoMyEvent infoEventContainer">
                                <p class="shortEventName"> <?php
                                    echo($item[0]);
                                    ?>
                                </p>
                                <p class="shortEventInfo"> <?php
                                    echo($item[2]." -- ");
                                    echo($item[1]);
                                    ?>
                                </p>
                            </div>
                        </div>



                        <div class="postEvent">
                            <?php suggestNearAndNowEvent($near_event, $orderedCategories, $id_facebook, $db); ?>
                        </div>

                    </div>
                <?php }}?>

        </div>
    </div>
</div><!-- /container -->

<div id="all-events">
    <span> All Events </span>
    <div class="all-events">
        <?php for($i=0; $i< count($resEvents); $i++){?>
            <div><span style="color: darkred"> <?php echo $resEvents[$i][0];?> </br></span></div>
            <div><span> <?php echo $resEvents[$i][1];?> </br></span></div>
            <div><span> <?php echo substr($resEvents[$i][2],0,10);?> </br></span></div>
            <div><span> <?php echo substr($resEvents[$i][3],0,5);?> </br></span></div>
            <div id="last"><span> <?php echo $resEvents[$i][4];?> </br></span></div><?php
        }?>
    </div>
</div>


<script src="js/events.js"></script>
<script src="js/calendar.js"></script>
<script src="js/classie.js"></script>
<script src="js/main3.js"></script>
</body>
</html>