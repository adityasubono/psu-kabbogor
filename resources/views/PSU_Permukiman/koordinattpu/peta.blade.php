@extends('layouts/main')

@section('title', 'Peta Permukiman TPU')

@section('container-fluid')
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
    @foreach( $koordinattpu as $koor ){{$koor->latitude}},{{$koor->longitude}},
    @endforeach</textarea>
            <div id="mymap"></div>
        </div>
    </div>


    <script
        src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
    </script>
    <script src="../../assets/js/gmap/gmaps.js"></script>
    <style type="text/css">
        #mymap {
            border:1px solid red;
            width: 950px;
            height: 500px;
        }
    </style>

    <style> #map { display: block; width: 98%; height: 500px; margin: 0 auto; } </style>
    <style type="text/css"> .labels { background-color: rgba(0, 0, 0, 0.5); border-radius: 4px; color: white; padding: 4px; } </style>`

    <script type="text/javascript">
        var locations_sarana = <?php print_r(json_encode($koordinattpu)) ?>;
        var mymap = new GMaps({
            el: '#mymap',
            lat: -6.485213,
            lng: 106.753537,
            zoom:12
        });

        $.each( locations_sarana, function( index, value ){
            mymap.addMarker({
                lat: value.latitude,
                lng: value.longitude,
                title: value.id,
                infoWindow: {
                    content: '<h6>'+ value.latitude +', '+ value.longitude+'</h6>',
                    maxWidth: 400
                }
            });
        });

    </script>


    <a href="/koordinattpus/{{$koor->permukiman_id}}"
       class="btn btn-info btn-icon-split mb-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>

</div>


@endsection
