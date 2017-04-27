/**
 * Created by aless on 27/04/2017.
 */
window.fbAsyncInit = function() {
    FB.init({
        appId      : '113406932542743',
        cookie     : true,
        xfbml      : true,
        version    : 'v2.7'
    });
};

// Load the SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/it_IT/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

