<style>
    #map {
        height: 600px;
    }

    #pac-input {
        width: 50% !important;
        top: 8px !important;
    }

</style>

<div class="row">
    <div class="jumbotron">
        <div class="post_block" style="padding: 0;margin: 5% auto;">

            <div id="map"></div>

        </div>
    </div>
</div>
<script>

    var map;
    var infowindow;

    function initMap() {
        var pyrmont = {lat: 41.976536, lng: -87.901614};

        map = new google.maps.Map(document.getElementById('map'), {
            center: pyrmont,
            zoom: 14
        });

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        /*service.getDetails({
                placeId: 'ChIJFfyzTTeuEmsRuMxvFyNRfbk'
            },
            function callback(results, status) {
                console.log(results);
                if (status === google.maps.places.PlacesServiceStatus.OK) {

                    for (var i = 0; i < results.length; i++) {
                        console.log(results[i]);
                        createMarker(results[i]);

                    }
                }
            }
        );*/

         service.nearbySearch({
         location: pyrmont,
         radius: 5000,
         type: ['lodging'],
         openNow:true
         //            ChIJFfyzTTeuEmsRuMxvFyNRfbk
         }, function callback(results, status) {

         if (status === google.maps.places.PlacesServiceStatus.OK) {
         for (var i = 0; i < results.length; i++) {
         //                    console.log(results[i]);
         createMarker(results[i]);
         }
         }
         });
    }

    function createMarker(place) {

        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location

        });


        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(place.name);
            infowindow.open(map, this);
        });
    }

</script>


<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpQT04ewmjvpyPrAZFWloK7awEClYPk5E&libraries=places&callback=initAutocomplete"></script>-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpQT04ewmjvpyPrAZFWloK7awEClYPk5E&libraries=places&callback=initMap"></script>

