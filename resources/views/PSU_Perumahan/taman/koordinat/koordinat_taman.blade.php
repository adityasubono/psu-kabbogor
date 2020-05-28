@extends('layouts/main')

@section('title', 'Input Data Koordinat Taman Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div id="googleMap" style="width:100%;height:380px;"></div>

    <form method="post" action="/koordinattamans/store" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Koordinat Taman :
                            {{$data_taman->nama_taman}}
                        </h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">ID Taman:
                            {{$data_taman->id}} ||
                            ID Perumahan:
                            {{$data_taman->perumahan_id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <label for="lng">Koordinat Longitude</label><br>

                        <input type="hidden" name="taman_id"
                               value="{{$data_taman->id}}">
                        <input type="hidden" name="perumahan_id"
                               value="{{$data_taman->perumahan_id}}">

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

                    <div class="col-sm-6">
                        <label for="lat">Koordinat Latitude</label><br>
                        <input type="text" class="form-control @error('latitude') is-invalid
                                 @enderror" id="lat" name="latitude"
                               placeholder="Masukan Nama Foto"
                               value="{{ old('latitude') }}">
                        @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="col-sm-4 mt-3">
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

    @include('PSU_Perumahan.taman.koordinat.tabel_koordinat_taman')
</div>


<style>
    #map {
        width: 400px;
        height: 400px;
    }
</style>
<!--<div id="map"></div>-->

<!-- Google Maps JS API -->
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
</script>
<!-- GMaps Library -->
<script src="../../assets/js/gmap/gmaps.js"></script>

<script>

    //var locations_sarana = <?php //print_r(json_encode($data_koordinat)) ?>//;

    var marker;
    var mymap = new GMaps({
        el: '#googleMap',
        lat: -6.485213,
        lng: 106.753537,
        zoom:12
    });
    function taruhMarker(peta, posisiTitik) {

        var marker = new google.maps.Marker({
            position: posisiTitik,
            map: peta
        });

        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
        }

        console.log("Posisi marker: " + posisiTitik);

        // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("lng").value = posisiTitik.lng();

    }
    // $.each( locations_sarana, function( index, value ){
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

    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-6.485219, 106.752375),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };



        var peta = new google.maps.Map(document.getElementById("googleMap"),
            propertiPeta);

        google.maps.event.addListener(peta, 'click', function (event) {
            taruhMarker(this, event.latLng);
        });

        // membuat Marker
        // var marker = new google.maps.Marker({
        //     position: new google.maps.LatLng(-6.485219, 106.752375),
        //     map: peta,
        //     animation: google.maps.Animation.BOUNCE,
        //    icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
        // });


    }

    // event jendela di-load
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


@endsection
