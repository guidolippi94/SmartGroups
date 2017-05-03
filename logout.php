<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 24/04/2017
 * Time: 18:45
 */
session_start();
unset($_SESSION);
session_destroy();
header("Location: index.php");
?>