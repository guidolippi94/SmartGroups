<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 01/09/2017
 * Time: 15:22
 */
session_start();

echo(json_encode($_SESSION['eventSuggestionList']));

