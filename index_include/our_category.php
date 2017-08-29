<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 28/08/17
 * Time: 16.16
 */
$json_file = file_get_contents("http://wwwext.comune.fi.it/opendata/files/eventi.json");


//$json_file=str_replace("Altri eventi", "entertainment", $json_file);
$json_file=str_replace("Aperture straordinarie, visite guidate", "education", $json_file);
$json_file=str_replace("Estate Fiorentina", "entertainment", $json_file);
$json_file=str_replace("Fiere, mercati", "food", $json_file);
$json_file=str_replace("Film festival", "entertainment", $json_file);
$json_file=str_replace("Mostre", "education", $json_file);
$json_file=str_replace("Musica classica, opera e balletto", "music", $json_file);
$json_file=str_replace("Musica rock, jazz, pop, contemporanea", "music", $json_file);
$json_file=str_replace("Readings, Conferenze, Convegni", "education", $json_file);
$json_file=str_replace("Sport", "sport", $json_file);
$json_file=str_replace("Tradizioni popolari", "education", $json_file);
$json_file=str_replace("Teatro", "entertainment", $json_file);
$json_file=str_replace("Walking", "healtcare", $json_file);




$utf8_1 = utf8_encode($json_file);
$utf8_2 = iconv('ISO-8859-1', 'UTF-8', $json_file);
$utf8_2 = mb_convert_encoding($json_file, 'UTF-8', 'ISO-8859-1');
$json_file = json_decode($utf8_2);


?>

