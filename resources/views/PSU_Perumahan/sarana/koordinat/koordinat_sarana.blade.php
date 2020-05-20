@extends('layouts/main')

@section('title', 'Input Data Foto ( Pertamanan )')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <!--    <div id="googleMap" style="width:100%;height:380px;"></div>-->
    <!--    <div id="map" style="width: 100%; height: 300px;"></div>-->
    <form method="post" action="/koordinatsarana/store" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gray-500">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Koordinat Sarana :
                            {{$data_sarana->nama_sarana}}
                        </h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="m-0 font-weight-bold text-primary text-right">ID Sarana:
                            {{$data_sarana->id}} ||
                            ID Perumahan:
                            {{$data_sarana->perumahan_id}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label for="nama_koordinat">Nama Koordinat Sarana</label><br>
                        <input type="text" class="form-control @error('nama_koordinat') is-invalid
                                 @enderror" id="nama_koordinat" name="nama_koordinat"
                               placeholder="Masukan Nama Foto"
                               value="{{ old('nama_koordinat') }}">
                        @error('nama_koordinat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="col-sm-4">
                        <label for="longitude">Koordinat Longitude</label><br>
                        <input type="text" class="form-control @error('longitude') is-invalid
                                 @enderror" id="lng" name="longitude"
                               placeholder="Masukan Nama Foto"
                               value="{{ old('longitude') }}">
                        @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <input type="hidden" class="form-control" id="perumahan_id"
                               name="perumahan_id"
                               value="{{$data_sarana->id}}">
                    </div>

                    <div class="col-sm-4">
                        <label for="latitude">Koordinat Latitude</label><br>
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
                        <button type="submit" class="btn btn-info btn-icon-split"
                                id="reset_data">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<style>
    #map {
        width: 400px;
        height: 400px;
    }
</style>
<div id="map"></div>

<!-- Google Maps JS API -->
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM"></script>
<!-- GMaps Library -->
<script src="../../assets/js/gmap/gmaps.js"></script>
<script>
    var mapObj = new GMaps({
        el: '#map',
        lat: -12.040397656836609,
        lng: -77.03373871559225
    });

    var path = [
        [-12.040397656836609, -77.03373871559225],
        [-12.040248585302038, -77.03993927003302],
        [-12.050047116528843, -77.02448169303511],
        [-12.044804866577001, -77.02154422636042]
    ];

    var pg = mapObj.drawPolygon({
        paths: path,
        strokeColor: '#000000',
        strokeOpacity: 0.3,
        strokeWeight: 2,
        fillColor: '#00e676',
        fillOpacity: 0.4
    });

</script>



<!--<script type="text/javascript">-->
<!--    map.addMarker({-->
<!--        lat: -12.043333,-->
<!--        lng: -77.028333,-->
<!--        title: 'Lima',-->
<!--        click: function (e) {-->
<!--            alert('You clicked in this marker');-->
<!--        }-->
<!--    });-->
<!--</script>-->
<!---->
<!--<script type="text/javascript">-->
<!--    function initialize() {-->
<!--        var latlng = new google.maps.LatLng(-6.485219, 106.752375);-->
<!--        var map = new google.maps.Map(document.getElementById('map'), {-->
<!--            center: latlng,-->
<!--            zoom: 13-->
<!--        });-->
<!--        var marker = new google.maps.Marker({-->
<!--            map: map,-->
<!--            position: latlng,-->
<!--            draggable: false,-->
<!--            anchorPoint: new google.maps.Point(0, -29)-->
<!--        });-->
<!--        var infowindow = new google.maps.InfoWindow();-->
<!--        google.maps.event.addListener(marker, 'click', function () {-->
<!--            var iwContent = '<div id="iw_container">' + '<div class="iw_title"><b>Location</b> : ' +-->
<!--                'Bumi Citra Asri</div></div>';-->
<!--            // including content to the infowindow-->
<!--            infowindow.setContent(iwContent);-->
<!--            // opening the infowindow in the current map and at the current marker location-->
<!--            infowindow.open(map, marker);-->
<!--        });-->
<!--    }-->
<!---->
<!--    google.maps.event.addDomListener(window, 'load', initialize);-->
<!--</script>-->

<!--<script-->
<!--    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM"></script>-->
<!--<script>-->
<!--    var marker;-->
<!---->
<!--    function taruhMarker(peta, posisiTitik) {-->
<!---->
<!--        var marker = new google.maps.Marker({-->
<!--            position: posisiTitik,-->
<!--            map: peta-->
<!--        });-->
<!---->
<!--        if (marker) {-->
<!--            // pindahkan marker-->
<!--            marker.setPosition(posisiTitik);-->
<!--        } else {-->
<!--            // buat marker baru-->
<!--            marker = new google.maps.Marker({-->
<!--                position: posisiTitik,-->
<!--                map: peta-->
<!--            });-->
<!--        }-->
<!---->
<!--      -->
<!--        // isi nilai koordinat ke form-->
<!--        document.getElementById("lat").value = posisiTitik.lat();-->
<!--        document.getElementById("lng").value = posisiTitik.lng();-->
<!---->
<!--    }-->
<!---->
<!--    function initialize() {-->
<!--        var propertiPeta = {-->
<!--            center: new google.maps.LatLng(-6.485219, 106.752375),-->
<!--            zoom: 14,-->
<!--            mapTypeId: google.maps.MapTypeId.ROADMAP-->
<!--        };-->
<!---->
<!--        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);-->
<!---->
<!--        google.maps.event.addListener(peta, 'click', function (event) {-->
<!--            taruhMarker(this, event.latLng);-->
<!--        });-->
<!---->
<!--        // membuat Marker-->
<!--        var marker = new google.maps.Marker({-->
<!--            position: new google.maps.LatLng(-6.485219, 106.752375),-->
<!--            map: peta,-->
<!--            animation: google.maps.Animation.BOUNCE,-->
<!--            icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"-->
<!--        });-->
<!---->
<!--    }-->
<!---->
<!--    // event jendela di-load-->
<!--    google.maps.event.addDomListener(window, 'load', initialize);-->
<!--</script>-->


@endsection
