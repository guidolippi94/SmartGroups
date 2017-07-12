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


<html>
<meta charset="UTF-8">

<link type="text/css" rel="stylesheet" href="materialize/css/materialize.css">
<link type="text/css" rel="stylesheet" href="style/index_style.css">
<link type="text/css" rel="stylesheet" href="style/general_style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/responsiveMenu.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="menuAnimation.js"></script>





<script src="Jquery-3.2.1.min/jquery-3.2.1.min.js"></script>
<script src="scriptINDEX.js"></script>


<body>

<?php echo var_dump($_SESSION); ?>
<div class="wrapper">

<div id='cssmenu'>
    <ul>
        <li><a href='index.php'>Home</a></li>
        <li class='active'><a href='#'>Products</a>
            <ul>
                <li><a href='#'>Product 1</a>
                    <ul>
                        <li><a href='#'>Sub Product</a></li>
                        <li><a href='#'>Sub Product</a></li>
                    </ul>
                </li>
                <li><a href='#'>Product 2</a>
                    <ul>
                        <li><a href='#'>Sub Product</a></li>
                        <li><a href='#'>Sub Product</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><button  onclick="click_notify()">Notify</button></li>
        <li><button  onclick="logout_script()">Logout</button></li>
    </ul>
</div>





    <div class="row_homepage, parallasse" id="header_row">

        <div id="profile_picture_div">
            <img id="pic_profile" src="<?php echo $_SESSION['immagine'] ?>" >
        </div>

        <div id="button_homepage">
            <ul id="buttons_list">
                <li id="settings_button"><button onclick="click_settings()" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">settings</i></button></li>
                <li id="notify_button"><button  onclick="click_notify()" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add_alert</i></button></li>
                <li id="logout_button"><button  onclick="logout_script()" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">cloud</i></button></li>
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