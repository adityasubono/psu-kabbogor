@extends('layouts/main')

@section('title', 'Kelola Data Koordinat Jalan Salauran')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div id="googleMap" style="width:100%;height:380px;"></div>

    <form method="post" action="/koordinatjalansalurans/store" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Koordinat Jalan Saluran :
                            {{$data_jalan_saluran->nama_jalan_saluran}}
                        </h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">ID Jalan Saluran:
                            {{$data_jalan_saluran->id}} ||
                            ID Perumahan:
                            {{$data_jalan_saluran->perumahan_id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row mt-3">
                    <div class="col-sm-6">

                        <input type="hidden" name="jalansaluran_id"
                               value="{{$data_jalan_saluran->id}}">
                        <input type="hidden" name="perumahan_id"
                               value="{{$data_jalan_saluran->perumahan_id}}">

                        <label for="lat">Koordinat Latitude</label><br>
                        <input type="text" class="form-control @error('latitude') is-invalid
                                 @enderror" id="lat" name="latitude"
                               placeholder="Masukan Koordinat Latitude"
                               value="{{ old('latitude') }}">
                        @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="lng">Koordinat Longitude</label><br>
                        <input type="text" class="form-control @error('longitude') is-invalid
                               @enderror" id="lng" name="longitude"
                               placeholder="Masukan Koordinat Longitude"
                               value="{{ old('longitude') }}">
                        @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4 mt-2">
                        <button type="button" class="btn btn-success btn-icon-split mr-2"
                                id="add_data_jalan_saluran">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </button>

                        <button type="button" class="btn btn-info btn-icon-split"
                                id="btn-reset-form">
                            <span class="icon text-white-50">
                                <i class="fas fa-sync"></i>
                            </span>
                            <span class="text">Reset</span>
                        </button>
                        <input type="hidden" id="jumlah-form" value="0">
                    </div>

                    <div id="jalansaluran-form"></div>


                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary btn-icon-split"
                                id="reset_data">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('PSU_Perumahan.jalansaluran.koordinat.tabel_koordinat_jalansaluran')
</div>

<script type="text/javascript" src="../assets/js/perumahan/jalansaluran/jalansaluran_form
.js"></script>

<style>
    #map {
        width: 400px;
        height: 400px;
    }
</style>
<!--<div id="map"></div>-->

<!-- Google Maps JS API -->

<!-- GMaps Library -->
<script type="text/javascript">
    //var locationspolyline = <?php //print_r(json_encode($data_koordinat_jalansaluran)) ?>//;
    //const jalansaluran_id = [];
    //var cordspolyline = {};
    //var coord_polyline={};
    //var polylines={};
    //var infowindow={};
    //var bounds = {};
    //
    //function initMap() {
    //    var map = new google.maps.Map(document.getElementById('googleMap'), {
    //        zoom: 12,
    //        center: {lat: -6.485213, lng: 106.753537},
    //        mapTypeId: 'terrain'
    //    });
    //
    //
    //    function onlyUnique(value, index, self) {
    //    return self.indexOf(value) === index;
    //}
    //for(let jalansaluran=0; jalansaluran< locationspolyline.length;jalansaluran++){
    //    const jalansaluranId = locationspolyline[jalansaluran].jalansaluran_id;
    //    jalansaluran_id.push(jalansaluranId);
    //}
    //var unique = jalansaluran_id.filter( onlyUnique );
    //var result = locationspolyline.reduce(function (r, a) {
    //    r[a.jalansaluran_id] = r[a.jalansaluran_id] || [];
    //    r[a.jalansaluran_id].push(a);
    //    return r;
    //}, Object.create(null));
    //console.log('result polyline',result);
    //for(let u=0;u< unique.length; u++){
    //    cordspolyline[u]=[];
    //    for (var j=0; j < result[unique[u]].length; j++) {
    //        const lt = parseFloat(result[unique[u]][j].latitude);
    //        const ltd = parseFloat(result[unique[u]][j].longitude);
    //        coord_polyline[j] = {lat: lt, lng:ltd};
    //        cordspolyline[u].push(coord_polyline[j]);
    //    }
    //}
    //
    //    for (let u = 0; u < unique.length; u++) {
    //        for (var j = 0; j < result[unique[u]].length; j++) {
    //            polylines[u] = new google.maps.Polyline({
    //                path: cordspolyline[u],
    //                geodesic: true,
    //                strokeColor: '#FF0000',
    //                strokeOpacity: 1.0,
    //                strokeWeight: 2
    //            });
    //
    //            polylines[u].setMap(map);
    //            bounds[u] = new google.maps.LatLngBounds();
    //            for (var i = 0; i < polylines[u].getPath().getLength(); i++) {
    //                bounds[u].extend(polylines[u].getPath().getAt(i));
    //            }
    //
    //            infowindow[u] = new google.maps.InfoWindow();
    //            infowindow[u].opened = false;
    //
    //            function mousefn(evt) {
    //                infowindow[u].setContent("<h5> id jalan saluran : "+ result[unique[u]][1]
    //                        .jalansaluran_id +
    //                    "</h5><div>" +
    //                    "</div>");
    //                infowindow[u].setPosition(bounds[u].getCenter());
    //                infowindow[u].open(map);
    //            }
    //
    //            google.maps.event.addListener(polylines[u], 'mouseover', mousefn);
    //            // google.maps.event.addListener(mrpdPolygon, 'mousemove', mousefn);
    //            google.maps.event.addListener(polylines[u], 'mouseout', function (evt) {
    //                infowindow[u].close();
    //                infowindow[u].opened = false;
    //            });
    //        }
    //    }
    //    google.maps.event.addDomListener(window, 'load', initMap);
    //}

    var poly;
    var map;
    var marker;
    var objLatLng = {};
    var arrayLatLng = [];

    function initMap() {
        map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 12,
            center: {lat: -6.485213, lng: 106.753537},  // Center the map on Chicago, USA.
        });

        poly = new google.maps.Polyline({
            strokeColor: 'blue',
            strokeOpacity: 1.0,
            strokeWeight: 3
        });
        poly.setMap(map);

        // Add a listener for the click event
        map.addListener('click', addLatLng);
    }

    // Handles click events on a map, and adds a new point to the Polyline.
    function addLatLng(event) {
        console.log('event', event)
        var path = poly.getPath();

        // Because path is an MVCArray, we can simply append a new coordinate
        // and it will automatically appear.
        path.push(event.latLng);
        console.log("event", event.latLng.lat())
        objLatLng = {lat: event.latLng.lat(), lng: event.latLng.lng()}
        console.log('obj latlng', objLatLng.lat, objLatLng.lng)

        arrayLatLng.push(objLatLng)
        // Add a new marker at the new plotted point on the polyline.
        var marker = new google.maps.Marker({
            position: event.latLng,
            title: '#' + path.getLength(),
            map: map
        });
        console.log("Posisi marker: " + arrayLatLng[0].lat);
        // for (let latlng = 0; latlng < arrayLatLng.length; latlng++) {
            //--------------event tambah marker lat long ke form
                var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
                var c = jumlah + 1; // Tambah 1 untuk jumlah form nya

                var perumahan_id = $('#perumahan_id').val();
                $("#jalansaluran-form").append(
                    '<div id="data_koordinat_append" class="mt-3 rounded">'
                    + '<h5><b>Data Koordinat Ke-' + c + '</b></h5>'
                    + '<hr class="bg-gradient-primary">'
                    + '<div class="row my-3">'
                    + '<div class="col-sm-6">'
                    + '<input type="hidden" class="form-control" id="perumahan_id"'
                    + 'name="data_koordinat['+ c +'][perumahan_id]" '
                    + 'value="'+ perumahan_id +'">'

                    + '<label for="longitude">Koordinat Latitude </label><br>'
                    + '<input type="text" class="form-control"'
                    + 'id="nama"name="data_koordinat['+ c +'][latitude]"'
                    + 'placeholder="Masukan Koordinat Latitude" value="'+event.latLng.lat()+'">'
                    + '</div>'

                    + '<div class="col-sm-6">'
                    + '<label for="latitude">Koordinat Longitude</label><br>'
                    + '<input type="text" name="data_koordinat[' + c + '][longitude]" '
                    + 'placeholder="Masukan Koordinat Longitude" value="'+event.latLng.lng()+'"'
                    + 'class="form-control" />'
                    + '</div>'

                    + '<div class="col-sm-4 mt-3">'
                    + '<button type="button" '
                    + 'class="btn btn-danger btn-icon-split mr-2'
                    + ' remove-data-koordinat">'
                    + '<span class="icon text-white-50">'
                    + '<i class="fas fa-minus"></i></span>'
                    + '<span class="text">Hapus</span></button>'
                    + '</div></div></div>');

                $("#jumlah-form").val(c); // Ubah value textbox jumlah-form dengan
                // variabel nextfor
                //----------------------
        // }


    }

    function taruhMarker(map, posisiTitik) {

        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: map
            });
        }

    }

</script>

<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM&callback=initMap">
</script>
@endsection
