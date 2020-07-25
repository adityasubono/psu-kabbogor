@extends('layouts/main')

@section('title', 'Halaman Rekapitulasi')

@section('container-fluid')
<div class="container-fluid">
    <link href="/assets/css/rekapitulasi.css" rel="stylesheet">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active bg-info text-white" id="nav-home-tab"
               data-toggle="tab"
               href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Peta</a>
            <a class="nav-item nav-link  bg-success text-white" id="nav-profile-tab"
               data-toggle="tab"
               href="#nav-profile" role="tab" aria-controls="nav-profile"
               aria-selected="false">Grafik</a>
            <a class="nav-item nav-link bg-warning text-white" id="nav-contact-tab"
               data-toggle="tab"
               href="#nav-contact" role="tab" aria-controls="nav-contact"
               aria-selected="false">Tabel</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
             aria-labelledby="nav-home-tab">

            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <div id="mymap1"></div>

                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                            <script
                                src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
                            </script>
                            <script src="../../assets/js/gmap/gmaps.js"></script>


                            <style type="text/css">
                                #mymap1 {
                                    border: 3px solid grey;
                                    width: 100%;
                                    border-radius: 10px;
                                    height: 600px;
                                }
                            </style>


                            <script type="text/javascript">


                                var locations_pertamanan = <?php print_r(json_encode($koor_pertamanan)) ?>;
                                var locations_permukiman = <?php print_r(json_encode($koor_permukiman)) ?>;
                                var locations_perumahan = <?php print_r(json_encode($koor_perumahan)) ?>;

                                var mymap = new GMaps({
                                    el: '#mymap1',
                                    lat: -6.485213,
                                    lng: 106.753537,
                                    zoom: 12
                                });

                                //PERTAMANAN
                                var icon_pertamanan = {
                                    url: "assets/images/pertamanan.png", // url
                                    scaledSize: new google.maps.Size(43, 43), // scaled size
                                    origin: new google.maps.Point(0, 0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };

                                $.each(locations_pertamanan, function (index, value) {
                                    mymap.addMarker({
                                        lat: value.latitude,
                                        lng: value.longitude,
                                        title: value.nama_taman,
                                        icon: icon_pertamanan,
                                        infoWindow: {
                                            content: ' <div id="content">' +
                                                '<div id="siteNotice">' +
                                                '<h4 id="firstHeading" class="firstHeading">'
                                                + value.nama_taman + '</h4>' +
                                                '<div id="bodyContent">' +
                                                '<p><b>Lokasi Alamat : </b>' + value.lokasi + ' ,'
                                                + value.kecamatan + ' ,'
                                                + value.kelurahan + ' RW :' + value.RW + ' / RT:'
                                                + value.RT + '</p>' +
                                                '</div>' + '</div>',
                                            maxWidth: 400
                                        }
                                    });
                                });

                                //PERMUKIMAN
                                var icon_permukiman = {
                                    url: "assets/images/permukiman.png", // url
                                    scaledSize: new google.maps.Size(35, 35), // scaled size
                                    origin: new google.maps.Point(0, 0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };

                                $.each(locations_permukiman, function (index, value) {
                                    mymap.addMarker({
                                        lat: value.latitude,
                                        lng: value.longitude,
                                        name: value.nama_tpu,
                                        icon: icon_permukiman,
                                        title: value.id,
                                        infoWindow: {
                                            content: ' <div id="content">' +
                                                '<div id="siteNotice">' +
                                                '<h4 id="firstHeading" class="firstHeading">'
                                                + value.nama_tpu + '</h4>' +
                                                '<div id="bodyContent">' +
                                                '<p><b>Lokasi Alamat : </b>' + value.lokasi + ' ,'
                                                + value.kecamatan + ' ,'
                                                + value.kelurahan + ' RW :' + value.RW + ' / RT:'
                                                + value.RT + '</p>' +
                                                '</div>' + '</div>',
                                            maxWidth: 700
                                        }
                                    });
                                });

                                //PERUMAHAN

                                $.each(locations_perumahan, function (index, value) {

                                    console.log(value.status_perumahan)
                                    if (value.status_perumahan === 'Terlantar') {
                                        var icon_perumahan = {
                                            url: "assets/images/terlantar.png", // url
                                            scaledSize: new google.maps.Size(40, 40), // scaled
                                            // size
                                            origin: new google.maps.Point(0, 0), // origin
                                            anchor: new google.maps.Point(0, 0) // anchor
                                        };
                                    } else if (value.status_perumahan === 'Sudah Serah Terima') {
                                        var icon_perumahan = {
                                            url: "assets/images/sudah_serah_terima.png", // url
                                            scaledSize: new google.maps.Size(30, 35), // scaled size
                                            origin: new google.maps.Point(0, 0), // origin
                                            anchor: new google.maps.Point(0, 0) // anchor
                                        };
                                    } else {
                                        var icon_perumahan = {
                                            url: "assets/images/belum_serah_terima.png", // url
                                            scaledSize: new google.maps.Size(40, 40), // scaled size
                                            origin: new google.maps.Point(0, 0), // origin
                                            anchor: new google.maps.Point(0, 0) // anchor
                                        }
                                    }

                                    mymap.addMarker({
                                        lat: value.latitude,
                                        lng: value.longitude,
                                        name: value.nama_perumahan,
                                        icon: icon_perumahan,
                                        title: value.id,
                                        infoWindow: {
                                            content: ' <div id="content">' +
                                                '<div id="siteNotice">' +
                                                '<h4 id="firstHeading" class="firstHeading">'
                                                + value.nama_perumahan + '</h4>' +
                                                '<div id="bodyContent">' +
                                                '<p><b>Lokasi Alamat : </b>' + value.lokasi + ' ,'
                                                + value.kecamatan + ' ,'
                                                + value.kelurahan + '</p>' +
                                                '<p>Luas Perumahan : ' + value.luas_perumahan
                                                + '</br>'
                                                +
                                                'Jumlah Perumahan : ' + value.jumlah_perumahan
                                                + '<br>'
                                                +
                                                'Nama Pengembang : ' + value.nama_pengembang
                                                + '<br>' +
                                                'Status Perumahan : ' + value.status_perumahan
                                                + '</p>'
                                                + '</div>'
                                                + '</div>',
                                            maxWidth: 700
                                        }
                                    });
                                });

                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card mb-3" style="background-color: #50ceff">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="../../assets/images/sudah_serah_terima.png"
                                     style="width: 40px; height: 40px;" class="card-img m-3">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Status Perumahan Sudah Serah Terima</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card mb-3" style="background-color: gold">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="../../assets/images/belum_serah_terima.png"
                                     style="width: 50px; height: 50px;" class="card-img m-3">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Status Perumahan Belum Serah Terima</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card mb-3" style="background-color: #ffba8c">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="../../assets/images/terlantar.png"
                                     style="width: 40px; height: 40px;" class="card-img m-3">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Status Perumahan <br> Terlantar</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card mb-3" style="background-color: #4cd213">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="../../assets/images/pertamanan.png"
                                     style="width: 40px; height: 40px;" class="card-img m-3">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Daerah Kawasan <br>Pertamanan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card mb-3" style="background-color: #5f5e4e">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="../../assets/images/permukiman.png"
                                     style="width: 40px; height: 40px;" class="card-img m-3">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Daerah Kawasan <br> Permukiman</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
             aria-labelledby="nav-profile-tab">

            <!--Google map-->

            <div class="card shadow mb-4">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">PSU Perumahan</h6>
                            </div>
                            <div class="card-body">
                                @include('PSU_Rekapitulasi.grafik.grafik_perumahan')
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">PSU
                                    Pertamanan</h6>
                            </div>
                            <div class="card-body">
                                @include('PSU_Rekapitulasi.grafik.grafik_pertamanan')
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">PSU Kawasan
                                    Permukiman</h6>
                            </div>
                            <div class="card-body">
                                @include('PSU_Rekapitulasi.grafik.grafik_permukiman')
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Kegiatan
                                    Fisik</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-bar">
                                    @include('PSU_Rekapitulasi.grafik.grafik_kegiatan_fisik')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Google Maps-->

        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
             aria-labelledby="nav-contact-tab">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Rekap</h6>
                </div>
                <div class="card-body">
                    @include('PSU_Rekapitulasi.tabel_data.data_rekap_psu')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
