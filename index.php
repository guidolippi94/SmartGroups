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

       <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css">

        <link type="text/css" rel="stylesheet" href="utility.css">

        <script src="Jquery-3.2.1.min/jquery-3.2.1.min.js"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="scriptINDEX.js"></script>


    <body>
     <div id="wrapper">

        <div class="row_homepage, parallasse" id="header_row">

            <div id="profile_picture_div">
                <img id="pic_profile" src="<?php echo $_SESSION['immagine'] ?>" >
            </div>

            <div id="button_homepage">
                <ul id="buttons_list">
                <li id="settings_button"><button onclick="click_settings()" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">settings</i></button></li>
                <li id="notify_button"><button class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add_alert</i></button></li>
                </ul>
            </div>
        </div>

         <div class="spacer"></div>

        <div class="row_homepage, parallasse" id="today_event">

        </div>

         <div class="spacer"></div>


         <div class="row_homepage" id="future_past_event">
            <div class="parallasse" id="past_event">

            </div>

             <div id="vertical_future_past_spacer"></div>

             <div class="parallasse" id="future_event">

            </div>

        </div>

    </div>




    </body>
    </html>