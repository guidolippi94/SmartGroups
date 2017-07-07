<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 05/07/2017
 * Time: 13:13
 */


    $query_save_point = "SELECT * FROM user_point WHERE id_facebook = '$idFacebook'";
    $res_save_point = $db->query($query_save_point);

    if($res_save_point==0){
        $query_save_point = "INSERT INTO user_point(id_facebook, music, sport, food, travel, fashion, education, entertainment, healtcare) VALUES ('$idFacebook', '$categories[0]', '$categories[1]', '$categories[2]', '$categories[3]' , '$categories[4]', '$categories[5]', '$categories[6]', '$categories[7]')";
        $db->query($query_save_point);

    }
    else{

        //se l'utente avesse già una riga salvata a cancello e ne scrivo una nuova, al fine di tenere aggiornati i valori della profilazione

        $query_save_point = "DELETE FROM user_point WHERE id_facebook = '$idFacebook'";
        $db->query($query_save_point);
        $query_save_point = "INSERT INTO user_point(id_facebook, music, sport, food, travel, fashion, education, entertainment, healtcare) VALUES ('$idFacebook', '$categories[0]', '$categories[1]', '$categories[2]', '$categories[3]' , '$categories[4]', '$categories[5]', '$categories[6]', '$categories[7]')";
        $db->query($query_save_point);
    }