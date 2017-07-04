/**
 * Created by aless on 21/06/2017.
 */


function initMap() {

    name_place.split(' ').join('+');


    getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=' + name_place + '&key=AIzaSyDhRE7xSMGWq_DO1BPzp48Fe81CNmJ6WHg').then(function (data) {
        stop++;
        if(data.status === 'OK') {
            boolFd = false;
            boolCa = false;
            boolEd = false;
            boolSp = false;
            boolTr = false;
            boolEn = false;
            boolFa = false;
            for(var j = 0; j < data.results[0].types.length; j++) {
                var type = data.results[0].types[j];
                if (type === "hospital" || type === "insurance_agency" || type === "pharmacy" || type === "physiotherapist" || type === "dentist" || type === "doctor" || type === "spa" || type === "health"){
                    if(!boolCa){
                        healtcare++;
                        boolCa = true;
                    }
                }
                else if (type === "art_gallery" || type === "library" || type === "book_store" || type === "painter" || type === "school" || type === "university"){
                    if(!boolEd){
                        education ++;
                        boolEd = true;
                    }
                }
                else if (type === "bicyle_store" || type === "bowling_alley" || type === "stadium" || type === "gym"){
                    if(!boolSp){
                        sport++;
                        boolSp =  true;
                    }
                }
                else if (type === "airport" || type === "lodging" || type === "bus_station" || type === "camground" || type === "moving_comapany" || type === "subway_station" || type === "taxi_stand" || type === "train_station" || type === "transit_station" || type === "travel_agency"){
                    if(!boolTr){
                        travel++;
                        boolTr = true;
                    }
                }
                else if (type === "amusement_park" || type === "acquarium" || type === "movie_rental" || type === "movie_theatre" || type === "night_club" || type === "park" || type === "casino" || type === "rv_parl" || type === "zoo"){
                    if(!boolEn){
                        entertainment++;
                        boolEn = true;
                    }
                }
                else if (type === "jewelry_store" || type === "beauty_salon" || type === "pet_store" || type === "clothing_store" || type === "shoe_store" || type === "shopping_mall" || type === "hair_care" || type === "home_goods_store"){
                    if(!boolFa){
                        fashion++;
                        boolFa = true;
                    }
                }
                else if (type === "bakery" || type === "liquor_store" || type === "bar" || type === "meal_delivery" || type === "meal_takeaway" || type === "cafe" || type === "restaurant" || type === "food"){
                    if(!boolFd) {
                        food++;
                        boolFd = true;
                    }
                }
            }
            /*
            console.log("care " + healtcare);
            console.log("education " + education);
            console.log("sport " + sport);
            console.log("travel " + travel);
            console.log("entrateneiment " + entertainment);
            console.log("fashion " + fashion);
            */
            console.log("food " + food);

        }

    }, function (status) { //error detection....
        stop++;
        alert('Something went wrong.');
    });


}