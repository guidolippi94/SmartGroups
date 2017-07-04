<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHtdL2EcNWf77iZ8aPWLV14fmDar2Q38Y&libraries=places&callback=initMap"
        async defer>

    var map;
    var infowindow;
    var Arezzo;
    function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
            center: Arezzo,
            zoom: 15
        });

        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: Arezzo,
            radius: 10
        }, callback);
    }

    function callback(results, status) {
        risjson = results;
        var distanza = new Array;
        var latitudine;
        var longitudine;
        var a, b, c;
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                latitudine = results[i].geometry.location.lat();
                longitudine = results[i].geometry.location.lng();
                a = sub(latitudine, Arezzo.lat);
                b = sub(longitudine, Arezzo.lng);
                distanza[i] = getDistance(a, b);
                if (Math.min.apply(Math, distanza) == distanza[i]) {
                    c = i;
                }
            }
            console.log(results[c]);
            var d = JSON.stringify(results[c].name);
        }
    }

    function sub(p1,p2){
        var a = p1 - p2;
        return a;
    }

    function getDistance(a, b){
        var c = a*a + b*b;
        var d = Math.sqrt(c);
        return d;
    }
</script>