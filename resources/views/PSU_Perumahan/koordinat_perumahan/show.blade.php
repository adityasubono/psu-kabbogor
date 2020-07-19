@extends('layouts/main')

@section('title', 'Peta Koordinat Perumahan ')

@section('container-fluid')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Peta Koordinat Perumahan {{$data_perumahan->nama_perumahan}}
                </div>
                <div class="card-body">
                    <div id="mymap"></div>
                    <a href="/perumahans/edit/{{$data_perumahan->id}}"
                       class="btn btn-info btn-icon-split mt-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Data Koordinat Perumahan
                </div>

                <div class="card-body">
                    @foreach( $koordinat as $koor )
                    {{$loop->iteration}}. {{$koor->latitude}},{{$koor->longitude}}<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <style type="text/css">
        #mymap {
            width: 100%;
            height: 550px;
        }
    </style>

    <script type="text/javascript">
        var locations = <?php print_r(json_encode($koordinat)) ?>;
        var perumahans = <?php print_r(json_encode($perumahans)) ?>;
        var polygons = {};
        var infowindow = {};
        var bounds = {};
        var cords = {};
        var coord = {};
        const perumahan_id = [];
        console.log('perumahans', perumahans)

        function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }

        for (let perumahan = 0; perumahan < locations.length; perumahan++) {
            const perumahanId = locations[perumahan].perumahan_id;
            perumahan_id.push(perumahanId);
        }
        var unique = perumahan_id.filter(onlyUnique);
        var result = locations.reduce(function (r, a) {
            r[a.perumahan_id] = r[a.perumahan_id] || [];
            r[a.perumahan_id].push(a);
            return r;
        }, Object.create(null));
        console.log('result', result);
        for (let u = 0; u < unique.length; u++) {
            cords[u] = [];
            for (var j = 0; j < result[unique[u]].length; j++) {
                const lt = parseFloat(result[unique[u]][j].latitude);
                const ltd = parseFloat(result[unique[u]][j].longitude);
                coord[j] = {lat: lt, lng: ltd};
                cords[u].push(coord[j]);
            }
        }

        function initMap() {
            var map = new google.maps.Map(document.getElementById('mymap'), {
                zoom: 12,
                center: {
                    lat: -6.485213,
                    lng: 106.753537,
                },
            });
            // Construction of polygon.
            for (let u = 0; u < unique.length; u++) {
                for (var j = 0; j < result[unique[u]].length; j++) {
                    polygons[u] = new google.maps.Polygon({
                        paths: cords[u],
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.6,
                        strokeWeight: 1,
                        fillColor: '#FF0000',
                        fillOpacity: 0.10
                    });
                    polygons[u].setMap(map);
                    bounds[u] = new google.maps.LatLngBounds();
                    for (var i = 0; i < polygons[u].getPath().getLength(); i++) {
                        bounds[u].extend(polygons[u].getPath().getAt(i));
                    }

                    infowindow[u] = new google.maps.InfoWindow();
                    infowindow[u].opened = false;

                    function mousefn(evt) {
                        infowindow[u].setContent(
                            '<div id="content">'+
                            '<div id="siteNotice">'+
                            '</div>'+
                            '<h4 id="firstHeading" class="firstHeading"> '+
                            result[unique[u]][1].nama_perumahan + '</h4>'+
                            '<div id="bodyContent">'+
                            '<p><b>'+result[unique[u]][1].nama_perumahan+' </b>, berlokasi di ' +
                            '<b>'+result[unique[u]][1].lokasi+'</b>'+
                            '<p><b>Status Perumahan : '+result[unique[u]][1].status_perumahan +
                            '</div>');
                        infowindow[u].setPosition(bounds[u].getCenter());
                        infowindow[u].open(map);
                    }

                    google.maps.event.addListener(polygons[u], 'mouseover', mousefn);
                    // google.maps.event.addListener(mrpdPolygon, 'mousemove', mousefn);
                    google.maps.event.addListener(polygons[u], 'mouseout', function (evt) {
                        infowindow[u].close();
                        infowindow[u].opened = false;
                    });
                }
            }
        }
    </script>
    <script
        src="
    http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM&callback=initMap">
    </script>
</div>

@endsection
