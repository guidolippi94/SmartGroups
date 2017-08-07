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
if (isset($_SESSION['idFacebook']) && is_numeric($_SESSION['idFacebook']) && $_SESSION['idFacebook'] != 0){
    ?>
    <script>
       window.location.href = ("index.php");
    </script>
<?php
}
?>
<html>
<head>

    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="img">
    <link type="text/css" rel="stylesheet" href="style/index_style.css">
    <link type="text/css" rel="stylesheet" href="style/login_style.css">
    <link type="text/css" rel="stylesheet" href="style/general_style.css">



    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="bootstrap-social-gh-pages/bootstrap-social.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhRE7xSMGWq_DO1BPzp48Fe81CNmJ6WHg&libraries=places"></script>
    <script src="Jquery-3.2.1.min/jquery-3.2.1.min.js"></script>
    <script src="scriptGoogle.js"></script>
    <script src="categoryConverter.js"></script>
    <script src="scriptFB.js"></script>

</head>
<body>

<div class="parallasse outer" id="login_wrapper" style="background: #fffce1">
    <div class="middle">
        <div class="row login-container">
            <div style="text-align: center; height: 200px">
                <button onclick="loginFacebook()" class="btn btn-social btn-lg btn-facebook" id="login_button_facebook" >
                    <span class="fa fa-facebook" id="logo-FB" ></span> <p class="fb-paragraph"> <b>Accedi a Facebook </b></p>
                </button>
            </div>
        </div>
    </div>
</div>

<div id="loading" style="display: none">
    <h3 id="loading-label">0%</h3>
    <div id="circle-loader"></div>
</div>

</body>
</html>