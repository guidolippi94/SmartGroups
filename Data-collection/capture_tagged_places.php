<?php

foreach ($user_tagged_places as $single_place){
    // $single_place = $user_tagged_places[1];

    $single_place_id = $single_place['place']['id'];
    $query_places = "SELECT * FROM tagged_places WHERE place_id = '$single_place_id' AND id_facebook = '$idFacebook'";

    $res_tagged_place = $db->query($query_places);

    if ($db->errno != 0) {
        echo "Impossibile caricare tagged_places";
        //exit();
    }

    if ($res_tagged_place->num_rows == 0) {
        //caso in cui il luogo non è mai stato registrato


        $tag_city = $single_place['place']['location']['city'];
        $tag_country = $single_place['place']['location']['country'];
        $tag_street = $single_place['place']['location']['street'];
        $tag_date =  substr($single_place['created_time'], 0,10);
        $tag_latitude = $single_place['place']['location']['latitude'];
        $tag_longitude = $single_place['place']['location']['longitude'];

        $query_places = "INSERT INTO tagged_places(place_id, city, country, street, tag_date, id_facebook, latitude, longitude) VALUES('$single_place_id','$tag_city', '$tag_country', '$tag_street', '$tag_date','$idFacebook', '$tag_latitude', '$tag_longitude')";
        $db->query($query_places);

        if ($db->errno != 0) {
            echo  nl2br ("\n INSERT tagged_place: \".$db->errno.\" , \".$tag_city.\" , \".$tag_country.\" , \".$tag_street.\" , \".$tag_date.\" , \".$single_place_id");
        }

        //TODO fare inserimento nella tabella table connection
    } else {
        //TODO fare solamente inserimento nella tabella table connection, poichè il luogo è già registrato e va asseganto all'utente
    }
}
?>
