<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 20/05/2017
 * Time: 17:06
 */
foreach ($user_events as $single_event){

    $single_event_id = $single_event['id'];
    $query_event = "SELECT * FROM joined_events WHERE event_id = '$single_event_id'";

    $res_single_event = $db->query($query_event);

    if ($db->errno != 0) {
        echo "Impossibile caricare joined_event";
        exit();
    }

    if ($res_single_event->num_rows == 0) {
        //caso in cui il luogo non è mai stato registrato

        $event_name = $single_event['name'];
        $place_name = $single_event['place']['name'];
        $event_date = $single_event['start_time'];
        $city = $single_event['place']['location']['city'];
        $country = $single_event['place']['location']['country'];
        $street = $single_event['place']['location']['street'];

        //TODO aggiungere tag_date parasata correttamente nell'insert into del db (per ora il campo è text ma andrà messo date)


        $query_event = "INSERT INTO joined_events(event_name, place_name, city, country, street, event_date, event_id) VALUES('$event_name','$place_name', '$city', '$country', '$street', '$event_date', '$single_event_id')";
        $db->query($query_event);

        if ($db->errno != 0) {
            echo "Impossibile inserire parametri in joined_event";
            exit();
        }

        //TODO fare inserimento nella tabella table connection

        $query_join_event = "INSERT INTO table_connection(id_facebook, joined_events) VALUES ('$idFacebook', '$single_event_id')";
        $db->query($query_join_event);

        if ($db->errno != 0) {
            echo "Impossibile inserire parametri in table_connection";
            exit();
        }


    } else {
        //TODO fare solamente inserimento nella tabella table connection, poichè il luogo è già registrato e va asseganto all'utente

        $query_idF_event = "SELECT * FROM table_connection WHERE idfacebook = '$idFacebook' AND joined_events = '$single_event_id'";
        $res_idF_event = $db->query($query_idF_event);

        if ($db->errno != 0) {
            echo "Impossibile caricare table_connection";
            exit();
        }

        if($res_idF_event->num_rows == 0) {
            // nel caso in cui non ho una connessione tra id Facebook e id evento

            $query_join_event = "INSERT INTO table_connection(id_facebook, joined_events) VALUES ('$idFacebook', '$single_event_id')";
            $db->query($query_join_event);

            if ($db->errno != 0) {
                echo "Impossibile inserire parametri in table_connection";
                exit();
            }
        }
    }
}
?>
