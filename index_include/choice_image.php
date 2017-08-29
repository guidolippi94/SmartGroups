<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 28/08/17
 * Time: 15.50
 */

function choise($category)
{
    if ($category === "healtcare") {
        echo "../img/icon/healtcare.png";
    } else if ($category === "sport") {
        echo "../img/icon/sport.png";
    } else if ($category === "education") {
        echo "../img/icon/education.png";
    } else if ($category === "travel") {
        echo "../img/icon/travel.png";
    } else if ($category === "entertainment") {
        echo "../img/icon/entertainment.png";
    } else if ($category === "fashion") {
        echo "../img/icon/fashion.png";
    } else if ($category === "food") {
        echo "../img/icon/food.png";
    } else if ($category === "music"){
        echo "../img/icon/music.png";
    }
}