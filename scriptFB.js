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
    FB.login(function(response) {
        if (response.status === 'connected') {
            var idUtente = response.authResponse.userID;
            FB.api('/me', { fields : "name, email, first_name, last_name, picture.width(800).height(800), events" }, function(response) {
                console.log(response);
                    dati = {
                        idFacebook : idUtente,
                        cognome : response.last_name,
                        nome : response.first_name,
                        email : response.email,
                        immagine : response.picture.data.url,
                        event_user : response.events.data[0]
                    };

                $.ajax({
                    type: "POST",
                    url: "do_login.php",
                    data: {
                        'nome': dati.nome,
                        'cognome' : dati.cognome,
                        'email': dati.email,
                        'idFacebook': dati.idFacebook,
                        'immagine': dati.immagine,
                        'event_user': dati.event_user
                        },
                    success: function(){
                        window.location.href = "index.php";
                    },
                    error: function() {
                        alert("error:");
                    }
                });
            });
        }
    }, { scope: 'email,public_profile,user_events' } );
}
