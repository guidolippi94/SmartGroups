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
if (!isset($_SESSION['idFacebook']) || !is_numeric($_SESSION['idFacebook']) || $_SESSION['idFacebook'] == 0) {
    ?>
    <script>window.location = "login.php";</script>
    <?php
}

$id_facebook = $_SESSION['idFacebook'];
include ('config.php');
include ('Data-collection/query_events.php');
include('index_include/choice_image.php');
include ('index_include/neaby_events.php');
include ('index_include/our_category.php');
include ('index_include/event_dispatcher.php');
include ('index_include/my_interest_included.php');
include ('index_include/select _sug_events.php');
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
    <link rel="stylesheet" type="text/css" href="style/index_style.css" />
    <link rel="stylesheet" type="text/css" href="style/calendar-style.css" />
    <link rel="stylesheet" type="text/css" href="style/event-table.css" />
    <link rel="stylesheet" type="text/css" href="style/popup.css"/>




    <script src="js/snap.svg-min.js"></script>
    <script src="Jquery-3.2.1.min/jquery-3.2.1.min.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<div id="lunghezza" style="display: none"><?php echo count($sugg)?></div>
<a href="index_test.php"> test </a>
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
                <!-- <a href="#"><i class="fa fa-fw fa-bell-o" id="icon"></i><span>Notifiche</span></a> -->
                <!-- <a href="#"><i class="fa fa-fw fa-envelope-o" id="icon"></i><span>Messages</span></a> -->
                <a href="#"><i class="fa fa-fw fa-calendar-check-o" id="icon"></i><span class="show-events" id="close-button">All Events</span></a>
                <a href="logout.php"><i class="fa fa-fw fa-undo" id="icon"></i><span>Logout</span></a>
                <!--<a href="#"><i class="fa fa-fw fa-newspaper-o" id="icon"></i><span>Reading List</span></a>-->
            </div>
        </nav>
        <!-- <button class="close-button" id="close-button"></button> -->
        <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
                <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
            </svg>
        </div>
    </div>
    <button class="menu-button" id="open-button"></button>
    <div class="content-wrap">
        <div class="top-site">
            <img class="logo" src="img/logoSmartGroups.png" style=" float:right; height: 100px; width: auto">

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
        </div>
        <div class="middle-side">


            <div class="title">
                <h2 class="title_my_event"> Miei Eventi </h2>
                <i class="fa fa-long-arrow-right" id="icon_arrow_right"></i>
                <h2 class="title_suggested_event"> Eventi suggeriti </h2>
            </div>



            <?php
            $query="SELECT event_name, start_time, street, picture, cover, latitude, longitude, event_date FROM joined_events WHERE id_facebook = '$id_facebook'";
            $result=$db->query($query);
            $tmp=$result->fetch_all();

            $i = 0;
            $z=0;
            unset($_SESSION['suggested_events']);
            foreach ($tmp as $item) {


                $my_data = new DateTime($item[7]);
                $my_lat = $item[5];
                $my_lon = $item[6];
                $my_data_string = $item[7];

                $intervallo = date_diff( $today, $my_data);
                if($intervallo->invert == 0){
                           //se è 0 vuol dire che il più piccolo è oggi



                $near_event = nearby_events($my_lat, $my_lon, $my_data_string, $json_file);
                //var_dump($near_event);
                $eventiPuttanaio = suggestNearAndNowEvent($near_event, $orderedCategories, $id_facebook, $db);
                //var_dump($eventiPuttanaio);
                //$array_session[$i]= $eventiPuttanaio;
                //var_dump($array_session);
                //var_dump(count($eventiPuttanaio));
                    ?>
              <div class="scrollx">

                 <div class="suggestEventWrapper" id="sug_event<?php echo $i+1 ?>">

                     <div class="myEvent" style="background: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.6)), url('<?php  echo $item[4]?>') no-repeat center; -webkit-background-size: contain;
                            background-size: cover;
                            ">
                        <img id="pic_event" src="<?php echo($item[4]) ?>">
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

                     <?php for($j=0;$j<count($eventiPuttanaio);$j++){
                         $text_button = able_disable($eventiPuttanaio[$j],$db,$id_facebook);


                         ?>

                     <div class="popup" style="display: none">
                         <div class="top">
                             <i class= "fa fa-angle-right right_"></i>
                             <i class="fa fa-angle-left left_"></i>
                             <img class="pic_icon">
                             <button class="interest" id="button<?php echo $z?>" onclick="update_my_interest(<?php echo $i?>,<?php echo $j?>,<?php echo $z;?>)"><?php echo $text_button?></button>
                         </div>
                         <div class="middle">
                             <p><?php echo $eventiPuttanaio[$j]->item->titolo_ita; ?></p>
                             <p><?php echo $eventiPuttanaio[$j]->item->indirizzi; ?></p>
                             <p><?php echo $eventiPuttanaio[$j]->item->orario; ?></p>
                             <p><?php echo $eventiPuttanaio[$j]->item->testo_ita; ?></p>
                             <p><?php echo $eventiPuttanaio[$j]->linking; ?></p>
                         </div>
                     </div>
                     <?php $z++;}
                     $_SESSION['suggested_events'][$i] = $eventiPuttanaio;
                     $i ++;
                     ?>


                    <div class="icon_arrow_right">
                        <i class="fa fa-long-arrow-right" style="display: inline-block;"></i>
                    </div>

                    <div class="postEvent" id="post<?php echo $i ?>">
                        <?php echo count($eventiPuttanaio)
                        ;?>
                    </div>

                </div>
            </div>
        <?php }} $y=1?>

        </div>
    </div>
</div><!-- /container -->


<div id="all-events" style="display: none">
    <span> All Events </span>
    <?php foreach ($sugg as $numb){

    ?>
    <div class="all-events">
            <div><span id="spanne<?php echo $y; $y++;?>" style="color: darkred"> <?php echo $numb[2]?></br></span></div>
            <div><span id="spanne<?php echo $y; $y++;?>"><?php echo $numb[4]?></br></span></div>
            <div><span id="spanne<?php echo $y; $y++;?>"><?php echo $numb[5]?></br></span></div>
            <div><span id="spanne<?php echo $y; $y++;?>"><?php echo $numb[3]?></br></span></div>
            <div id="last"><span></br></span></div>
    </div>
    <?php }?>

</div>




<script src="js/popup.js"></script>
<script src="js/events.js"></script>
<script src="js/calendar.js"></script>
<script src="js/classie.js"></script>
<script src="js/main3.js"></script>
</body>
</html>