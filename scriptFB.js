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
                        eventUser : response.events.data[0]

                    };
                    var dataJson=dati;

                    var test = "test variabile ajax";

                $.ajax({
                    url: 'do_login.php',
                    type: 'POST',
                    data: {test: test},
                    dataType: "json",
                    success: function()
                    {
                        alert("success ajax");
                    },
                    error: function()
                    {
                        alert("Chiamata fallita, si prega di riprovare...");
                    }
                });

                window.location.href = "do_login.php";
            });
        }
    }, { scope: 'email,public_profile,user_events' } );
}

function completaLoginFacebook(dati) {
    window.location.href = "do_login.php?p=" + btoa(JSON.stringify(dati));
}
