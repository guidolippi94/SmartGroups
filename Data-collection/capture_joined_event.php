<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 20/05/2017
 * Time: 17:06
 */
$user_events_list = $_SESSION['user_events'];
$today = date("Y-m-d");

foreach ($user_events_list as $single_event){

    $single_event_id = $single_event['id'];
    $query_event = "SELECT * FROM joined_events WHERE event_id = '$single_event_id' AND id_facebook = '$idFacebook'";

    $res_single_event = $db->query($query_event);

    if ($db->errno != 0) {
        echo "Impossibile caricare joined_event";
    }

    if ($single_event['place']['location']['city'] == "Florence" && date('Y-m-d',strtotime($single_event['start_time'])) >= $today &&$res_single_event->num_rows == 0) {
        //caso in cui il luogo non è mai stato registrato

        $event_name = $single_event['name'];
        $event_place_name = $single_event['place']['name'];
        $event_date = strtotime($single_event['start_time']);
        $start_time = date('H:i', strtotime($single_event['start_time']));
        $end_time = date('H:i', strtotime($single_event['end_time']));
        $event_city = $single_event['place']['location']['city'];
        $event_country = $single_event['place']['location']['country'];
        $event_street = $single_event['place']['location']['street'];
        $event_latitude = $single_event['place']['location']['latitude'];
        $event_longitude = $single_event['place']['location']['longitude'];
        $event_rsvp_status = $single_event['rsvp_status'];
        $event_cover=$single_event['cover']['source'];
        $event_picture = $single_event['picture']['data']['url'];

        $event_date = date('Y-m-d', $event_date);

        $query_event = "INSERT INTO joined_events(event_name, place_name, city, country, street, event_date, start_time, end_time, event_id, id_facebook, latitude, longitude, rspv_status, category, cover, picture) VALUES('$event_name','$event_place_name', '$event_city', '$event_country', '$event_street', '$event_date', '$start_time', '$end_time', '$single_event_id','$idFacebook', '$event_latitude', '$event_longitude', '$event_rsvp_status','category', '$event_cover', '$event_picture')";
        $db->query($query_event);

        if ($db->errno != 0) {
            echo  nl2br ("\n INSERT tagged_place: \".$db->errno.\" , \".$event_city.\" , \".$event_country.\" , \".$event_street.\" , \".$event_name.\" , \".$event_name");
        }

        $query_join_event = "INSERT INTO table_connection(id_facebook, joined_events) VALUES ('$idFacebook', '$single_event_id')";
        $db->query($query_join_event);

        if ($db->errno != 0) {
            echo "Impossibile inserire parametri in table_connection";
        }


    } else if ($single_event['place']['location']['city'] == "Florence" && date('Y-m-d',strtotime($single_event['start_time'])) >= $today){
        //TODO fare solamente inserimento nella tabella table connection, poichè il luogo è già registrato e va asseganto all'utente

        $query_idF_event = "SELECT * FROM table_connection WHERE id_facebook = '$idFacebook' AND joined_events = '$single_event_id'";
        $res_idF_event = $db->query($query_idF_event);

        if ($db->errno != 0) {
            echo "SELECT table_connection error: ".$db->errno;
        }

        if($res_idF_event->num_rows == 0) {
            // nel caso in cui non ho una connessione tra id Facebook e id evento

            $query_join_event = "INSERT INTO table_connection(id_facebook, joined_events) VALUES ('$idFacebook', '$single_event_id')";
            $db->query($query_join_event);

            if ($db->errno != 0) {
                echo "INSERT table_connection error: ".$db->errno;
            }
        }
    }
}
?>
