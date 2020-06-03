@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />

<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="m-0 font-weight-bold text-primary">Data Peta </h6>
                </div>
            </div>
        </div>

        <div class="card-body">


<textarea class="form-control" rows="5" disabled>
    @foreach( $koordinat as $koor ){{$koor->latitude}},{{$koor->longitude}},
    @endforeach</textarea>
<!--            <div id="mymap"></div>-->
            <div id="map" style="width: 1089px; height: 500px"></div>
        </div>
    </div>



    <script src="../../assets/js/gmap/gmaps.js"></script>
    <style type="text/css">
        #mymap {
            border:1px solid red;
            width: 950px;
            height: 500px;
        }
    </style>

    <script type="text/javascript">
        var locationspolyline = <?php print_r(json_encode($koordinat)) ?>;
        const jalansaluran_id = [];
        var cordspolyline = {};
        var coord_polyline={};
        var polylines={};
        var infowindow={};
        var bounds = {};
        function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }
        for(let jalansaluran=0; jalansaluran< locationspolyline.length;jalansaluran++){
            const jalansaluranId = locationspolyline[jalansaluran].jalansaluran_id;
            jalansaluran_id.push(jalansaluranId);
        }
        var unique = jalansaluran_id.filter( onlyUnique );
        var result = locationspolyline.reduce(function (r, a) {
            r[a.jalansaluran_id] = r[a.jalansaluran_id] || [];
            r[a.jalansaluran_id].push(a);
            return r;
        }, Object.create(null));
        console.log('result polyline',result);
        for(let u=0;u< unique.length; u++){
            cordspolyline[u]=[];
            for (var j=0; j < result[unique[u]].length; j++) {
                const lt = parseFloat(result[unique[u]][j].latitude);
                const ltd = parseFloat(result[unique[u]][j].longitude);
                coord_polyline[j] = {lat: lt, lng:ltd};
                cordspolyline[u].push(coord_polyline[j]);
            }
        }
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {lat: -6.485213, lng: 106.753537},
                mapTypeId: 'terrain'
            });

            var polylinekoordinat = [
                {lat: -6.486541354087505, lng: 106.73779679193464},
                {lat: -6.485571674031478, lng: 106.75410462274519},
                {lat: -6.472855109038622, lng: 106.77736473932234},
            ];

            for (let u = 0; u < unique.length; u++) {
                for (var j = 0; j < result[unique[u]].length; j++) {
                    polylines[u] = new google.maps.Polyline({
                        path: cordspolyline[u],
                        geodesic: true,
                        strokeColor: '#FF0000',
                        strokeOpacity: 1.0,
                        strokeWeight: 2
                    });

                    polylines[u].setMap(map);
                    bounds[u] = new google.maps.LatLngBounds();
                    for (var i = 0; i < polylines[u].getPath().getLength(); i++) {
                        bounds[u].extend(polylines[u].getPath().getAt(i));
                    }

                    infowindow[u] = new google.maps.InfoWindow();
                    infowindow[u].opened = false;

                    function mousefn(evt) {
                        infowindow[u].setContent("<h5> id jalan saluran : "+ result[unique[u]][1]
                                .jalansaluran_id +
                            "</h5><div>" +
                            "</div>");
                        infowindow[u].setPosition(bounds[u].getCenter());
                        infowindow[u].open(map);
                    }

                    google.maps.event.addListener(polylines[u], 'mouseover', mousefn);
                    // google.maps.event.addListener(mrpdPolygon, 'mousemove', mousefn);
                    google.maps.event.addListener(polylines[u], 'mouseout', function (evt) {
                        infowindow[u].close();
                        infowindow[u].opened = false;
                    });
                }
            }
        }

        // $.each( locations, function( index, value ){
        //     mymap.addMarker({
        //         lat: value.latitude,
        //         lng: value.longitude,
        //         title: value.id,
        //         infoWindow: {
        //             content: '<h6>'+ value.latitude +', '+ value.longitude+'</h6>',
        //             maxWidth: 400
        //         }
        //     });
        // });

    </script>

    <a href="/koordinatjalansalurans/{{$koor->jalansaluran_id}}"
       class="btn btn-info btn-icon-split mb-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>
</div>
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM&callback=initMap">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection
