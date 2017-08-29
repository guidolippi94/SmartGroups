<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 28/08/17
 * Time: 17.25
 */


function nearby_events( $my_event_latitude, $my_event_longitude, $data, $all_events){

    $nearby_event = array();

    foreach ($all_events->rows as $florence_event) {
        $florence_event_latitude = $florence_event->recapito[0]->lat;
        $florence_event_longitude = $florence_event->recapito[0]->lon;
        $data_event_florence = $florence_event->data_to;

        $distance = disgeod($my_event_latitude, $my_event_longitude, $florence_event_latitude, $florence_event_longitude);
        if ($distance <= 100000 && $data == $data_event_florence) {
            array_push($nearby_event, $florence_event);
        }
    }
    return $nearby_event;
}

function disgeod ($latA, $lonA, $latB, $lonB){

    //$d = sqrt(pow(($latA-$latB),2)+pow($lonA-$lonB,2));
    //return $d;


    /* Definisce le costanti e le variabili */
    $R = 6371.005076123;
    $pigreco = pi ();

    /* Converte i gradi in radianti */
    $lat_alfa = $pigreco * $latA / 180.0;
    $lat_beta = $pigreco * $latB / 180.0;
    $lon_alfa = $pigreco * $lonA / 180.0;
    $lon_beta = $pigreco * $lonB / 180.0;
    /* Calcola l'angolo compreso fi */
    $fi = abs($lon_alfa - $lon_beta);
    /* Calcola il terzo lato del triangolo sferico */
    $p = acos(sin($lat_beta) * sin($lat_alfa) +
        cos($lat_beta) * cos($lat_alfa) * cos($fi));
    /* Calcola la distanza sulla superficie
    terrestre R = ~6371 km */
    $d = $p * $R;
    return($d * 1000.0);

}


