<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 02/09/17
 * Time: 15.46
 */

function able_disable($final_json, $db, $id_facebook){
    $giulia = $final_json->item->cod_evento;
    $query="SELECT * FROM suggested_events WHERE id_evento='$giulia' AND id_facebook='$id_facebook'";
    $res = $db->query($query);
    if ($db->errno != 0) { echo "Impossibile trovare l'eventi"; exit(); }

    if($res->num_rows == 0){
        return "Mi interessa";
    }
    else{
        return "Non mi interessa più";
    }
}