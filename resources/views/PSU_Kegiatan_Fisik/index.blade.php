@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')
<div class="container-fluid">

    <script
        src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
    </script>
    <script src="../../assets/js/gmap/gmaps.js"></script>
        <style type="text/css">
            #mymap {
                border:1px solid red;
                width: 800px;
                height: 500px;
            }
        </style>

    <style> #map { display: block; width: 98%; height: 500px; margin: 0 auto; } </style>
    <style type="text/css"> .labels { background-color: rgba(0, 0, 0, 0.5); border-radius: 4px; color: white; padding: 4px; } </style>`




    <div id="mymap"></div>


    <script type="text/javascript">


        var locations_pertamanan = <?php print_r(json_encode($locations_pertamanan)) ?>;

        var locations_permukiman = <?php print_r(json_encode($locations_permukiman)) ?>;

        var locations_sarana = <?php print_r(json_encode($locations_sarana)) ?>;


        var mymap = new GMaps({
            el: '#mymap',
            lat: -6.485213,
            lng: 106.753537,
            zoom:9
        });

        var contentString = '<h5>Hello Dunia!</h5>';

        $.each( locations_permukiman, function( index, value ){
            mymap.addMarker({
                lat: value.longitude,
                lng: value.latitude,
                title: value.id,
                icon: "assets/images/icon_2.png",
                infoWindow: {
                    content: contentString,
                    maxWidth: 100
                },
                Anchor: new google.maps.Point(3, 30),
                labelClass: "labels", // the CSS class for the label
            });
        });


        $.each( locations_pertamanan, function( index, value ){
            mymap.addMarker({
                lat: value.latitude,
                lng: value.longitude,
                title: value.id,
                infoWindow: {
                    content: '<h4> Pertamanan'+ value.id +'</h4><div>Pertamanan</div>',
                    maxWidth: 100
                }
            });
        });

        $.each( locations_sarana, function( index, value ){
            mymap.addMarker({
                lat: value.longitude,
                lng: value.latitude,
                title: value.id,
                infoWindow: {
                    content: '<h4> Sarana'+ value.id +'</h4><div>Sarana</div>',
                    maxWidth: 100
                }
            });
        });
    </script>
</div>


@endsection
