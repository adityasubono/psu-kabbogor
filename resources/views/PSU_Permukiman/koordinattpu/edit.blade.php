@extends('layouts/main')

@section('title', 'Input Data Koordinat Sarana')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div id="googleMap" style="width:100%;height:380px;"></div>

    <form method="post" action="/koordinattpus/update/{{$koordinattpu->id}}"
          enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-8">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Koordinat
                            {{$koordinattpu->latlong}}
                        </h6>
                    </div>
                    <div class="col-sm-4">
                        <h6 class="m-0 font-weight-bold text-primary text-right">ID Koordinat:
                            {{$koordinattpu->id}} ||
                            ID Permukiman:
                            {{$koordinattpu->permukiman_id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <label for="lng">Koordinat Latitude</label><br>
                        <input type="hidden" name="permukiman_id"
                               value="{{$koordinattpu->permukiman_id}}">

                        <input type="text" class="form-control @error('latitude') is-invalid
                                 @enderror" id="lat" name="latitude"
                               placeholder="Masukan Nama Foto"
                               value="{{$koordinattpu->latitude}}">
                        @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="lat">Koordinat Longitude</label><br>
                        <input type="text" class="form-control @error('longitude') is-invalid
                                 @enderror" id="lng" name="longitude"
                               placeholder="Masukan Koordinat Longitude"
                               value="{{$koordinattpu->longitude}}">
                        @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-4 mt-3">

                        <a href="/koordinattpus/{{$koordinattpu->permukiman_id}}"
                           class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-alt-circle-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>

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
</div>


<!--<div id="map"></div>-->

<!-- Google Maps JS API -->
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
</script>
<!-- GMaps Library -->
<script src="../../assets/js/gmap/gmaps.js"></script>



<script>

    var marker;
    function taruhMarker(peta, posisiTitik){

        if( marker ){
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
        }
        // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("lng").value = posisiTitik.lng();

    }

    function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-6.485219,106.752375),
            zoom:14,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });

        // membuat Marker
        // var marker=new google.maps.Marker({
        //     position: new google.maps.LatLng(-6.485219,106.752375),
        //     map: peta,
        //     animation: google.maps.Animation.BOUNCE,
        //     icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
        // });

    }
    // event jendela di-load
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


@endsection
