/**
 * Created by aless on 24/04/2017.
 */


window.fbAsyncInit = function() {
    FB.init({
        appId      : '113406932542743',
        cookie     : true,
        xfbml      : true,
        version    : 'v2.9'
    });
};

// Load the SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function loginFacebook() {

    document.getElementById('loading').setAttribute("style", "display:null");

    FB.login(function(response) {
        if (response.status === 'connected') {
            var idUtente = response.authResponse.userID;

            FB.api('/me', { fields : "name, email, first_name, last_name, picture.width(800).height(800), events, tagged_places, likes{category}" }, function(response) {
                console.log(response);
                arr = {
                    idFacebook : idUtente,
                    cognome : response.last_name,
                    nome : response.first_name,
                    email : response.email,
                    immagine : response.picture.data.url,
                    event_user : response.events.data,
                    user_tagged_places : response.tagged_places.data,
                    user_likes : response.likes
                };

                dati = arr;
                likes = arr.user_likes;
                convertCategoriesFromUserLikes(likes);
                N = response.tagged_places.data.length;
                responseDelSoci = response.tagged_places;
                stop = 0;


                for(var icaro = 0; icaro < N; icaro++) {
                    name_place = responseDelSoci.data[icaro].place.name;
                    initMap();
                }



                setTimeout(function () {
                    $.ajax({
                        type: "POST",
                        url: "do_login.php",
                        data: {
                            'nome': dati.nome,
                            'cognome' : dati.cognome,
                            'email': dati.email,
                            'idFacebook': dati.idFacebook,
                            'immagine': dati.immagine,
                            'event_user': dati.event_user,
                            'user_tagged_places': dati.user_tagged_places,
                            'food' : food
                        },
                        success: function(){
                            window.location.href = "index.php";
                        },
                        error: function() {
                            alert("error:");
                        }
                    });
                }, 4000)

            });
        }
    }, { scope: 'email,public_profile,user_events,user_tagged_places,user_likes' } );
}

var map;
var position = [];
var d;
var count;
var N;
var responseDelSoci, name_place;
var dati;

// sono le nostre categorie
var music = 0;
var sport = 0;
var food = 0;
var travel= 0;
var fashion= 0;
var education = 0;
var entertainment = 0;
var healtcare = 0;



function getJSON(url) {
    return new Promise(function (resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open('get', url, true);
        xhr.responseType = 'json';
        xhr.onload = function () {
            var status = xhr.status;
            if (status == 200) {
                resolve(xhr.response);
            } else {
                reject(status);
            }
        };
        xhr.send();
    })
}


