<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 20/05/2017
 * Time: 17:06
 */
session_start();

// verifico di aver fatto il login
if (isset($_SESSION['idFacebook']) && !is_numeric($_SESSION['idFacebook']) && $_SESSION['idFaceook'] != 0){
    ?>
    <script>
        window.location = "index.php";
    </script>
    <?php

}
