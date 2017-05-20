<?php
/**
 * Created by PhpStorm.
 * User: guidolippi
 * Date: 20/05/2017
 * Time: 17:06
 */

//function insert_tagged_places($user_tagged_places){

//$_SESSION['parsed_place'] = $user_tagged_places[1]['created_time'];

    foreach ($user_tagged_places as $sigle_place){
        $single_place = $user_tagged_places[0];


        $query_places = "SELECT * FROM tagged_places WHERE place_id = '$single_place_id'";

        $res_taged_place = $db->query($query_places);

        if ($db->errno != 0) {
            echo "Impossibile caricare tagged_places";
            exit();
        }

        if($res_taged_place->num_rows == 0){
            //caso in cui il luogo non è mai stato registrato

            $single_place_id = $single_place['place']['id'];
            $city = $single_place['place']['location']['city'];
            $country = $single_place['place']['location']['country'];
            $street = $single_place['place']['location']['street'];
            $tag_date = $single_place['created_time'];

            //TODO aggiungere tag_date parasata correttamente nell'insert into del db (per ora il campo è text ma andrà messo date)


            $query_places = "INSERT INTO tagged_places(place_id, city, country, street, tag_date) VALUES('$single_place_id','$city', '$country', '$street', '$tag_date')";
            $db->query($query_places);

            if ($db->errno != 0) {
                echo "Impossibile inserire parametri in tagged_places";
                exit();
            }

            //TODO fare inserimento nella tabella table connection
        }
        else{
            //TODO fare solamente inserimento nella tabella table connection, poichè il luogo è già registrato e va asseganto all'utente
        }
    }
//}

?>


<!--

$query = "SELECT * FROM utenti WHERE email = '$email' AND id_facebook = '$idFacebook'";
$resUtente = $db->query($query);
if ($db->errno != 0) { echo "Impossibile caricare gli utenti"; exit(); }

if ($resUtente->num_rows == 0)
{
// in questo caso l'utente non è registrato, lo registro quindi
$query = "INSERT INTO utenti(email, cognome, nome, id_facebook, immagine) VALUES('$email', '$cognome', '$nome', '$idFacebook','$immagine')";
$db->query($query);
if ($db->errno != 0) { echo "Impossibile registrare il nuovo utente"; exit(); }

$idUtente = $db->insert_id;
}
else
{
$rigaUtente = $resUtente->fetch_array();
$idUtente = $rigaUtente['id'];
}


foreach ($obj as $a) {
    echo $a['place']['id'];
}
-->