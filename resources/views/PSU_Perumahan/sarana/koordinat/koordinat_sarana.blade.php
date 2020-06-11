@extends('layouts/main')

@section('title', 'Input Data Foto ( Pertamanan )')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div id="googleMap" style="width:100%;height:380px;"></div>

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
                    <div class="col-sm-6">
                        <label for="lng">Koordinat Longitude</label><br>

                        <input type="hidden" name="sarana_id" id="sarana_id"
                               value="{{$data_sarana->id}}">

                        <input type="hidden" name="perumahan_id"  id="perumahan_id"
                               value="{{$data_sarana->perumahan_id}}">

                    </div>
                </div>
                <input type="hidden" id="jumlah-form" value="0">
                <div id="sarana-form"></div>

                <button type="submit" class="btn btn-primary btn-icon-split mt-3"
                        id="reset_data">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
                    <span class="text">Simpan</span>
                </button>

                <button type="button" class="btn btn-info btn-icon-split mt-3" id="btn-reset-form">
                    <span class="icon text-white-50">
                        <i class="fas fa-sync"></i>
                    </span>
                    <span class="text">Reset</span>
                </button>

            </div>
        </div>
    </form>

    @include('PSU_Perumahan.sarana.koordinat.tabel_koordinat_sarana')
</div>


<style>
    #map {
        width: 400px;
        height: 400px;
    }
</style>

<script>
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
        var d = jumlah;

        var perumahan_id = $('#perumahan_id').val();
        var sarana_id = $('#sarana_id').val();

        $("#sarana-form").append(
            '<div id="data_sarana_append" class="mt-3 rounded">'
            + '<h5><b>Data Koordinat Ke-' + c + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<div class="row">'
            + '<div class="col-sm-5">'
            + '<input type="hidden" class="form-control" id="perumahan_id"'
            + 'name="data_koordinat[' + d + '][perumahan_id]" '
            + 'value="' + perumahan_id + '">'

            + '<input type="hidden" class="form-control" id="sarana_id"'
            + 'name="data_koordinat[' + d + '][sarana_id]" '
            + 'value="' + sarana_id + '">'

            + '<label for="longitude">Koordinat Latitude </label><br>'
            + '<input type="text" class="form-control"'
            + 'id="nama"name="data_koordinat[' + d + '][latitude]"'
            + 'placeholder="Masukan Koordinat Latitude" value="' + event.latLng.lat() + '">'
            + '</div>'

            + '<div class="col-sm-5">'
            + '<label for="latitude">Koordinat Longitude</label><br>'
            + '<input type="text" name="data_koordinat[' + d + '][longitude]" '
            + 'placeholder="Masukan Koordinat Longitude" value="' + event.latLng.lng() + '"'
            + 'class="form-control" />'
            + '</div>'

            + '<div class="col-sm-2">'
            + '<label for="aksi">Aksi</label><br>'
            + '<button type="button" '
            + 'class="btn btn-danger btn-icon-split mr-2'
            + ' remove-data-koordinat">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-minus"></i></span>'
            + '<span class="text">Hapus</span></button>'
            + '</div></div></div>'
        );
        $(document).on('click', '.remove-data-taman', function () {
            $(this).parents('#data_sarana_append').remove();
        });

        $("#btn-reset-form").click(function(){
            $("#sarana-form").html(""); // Kita kosongkan isi dari div
            // insert-form
            $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
        });

        $("#jumlah-form").val(c);// Ubah value textbox jumlah-form dengan

    }

    $("#jumlah-form").val(d);


</script>

<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM&libraries=places&callback=initMap"
    async defer>
</script>


@endsection
