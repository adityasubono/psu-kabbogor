@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')
<div class="container-fluid">

    <div id="map"></div>
    <style type="text/css">
        #map {
            border: 1px solid red;
            width: 100%;
            height: 600px;
        }
    </style>


    <script type="text/javascript">

        var loc_permukiman = <?php print_r(json_encode($locations_permukiman))?>;
        var marker;
        var infowindow={};

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {lat: -6.48185947262063, lng: 106.68844918541747}
            });

            setMarkers(map);
        }

        function setMarkers(map) {

            for (var i = 0; i < loc_permukiman.length; i++) {
                // console.log('permukiman', loc_permukiman[i].latitude)
                var latitude = parseFloat(loc_permukiman[i].latitude);
                var longitude = parseFloat(loc_permukiman[i].longitude);
                var contentString = parseFloat(loc_permukiman[i].latitude);



                infowindow[i] = new google.maps.InfoWindow();

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(latitude, longitude),
                        map: map,
                        content: contentString,
                });
                marker.addListener('click', function() {
                    // read custom data in this.data
                    infowindow.setContent('<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">'+ latitude +','+ longitude+'</h1>'+
                        '<div id="bodyContent">'+
                        '<p>'+ latitude +','+ longitude+'</p>'+
                        '</div>'+
                        '</div>');

                    infowindow.open(map, this);
                    map.setCenter(this.getPosition());

                    // infowindow.open(map, marker);
                });

            }
        }


    </script>
</div>

<script async defer
        src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM&callback=initMap">
</script>

@endsection
