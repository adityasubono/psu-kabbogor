@extends('layouts/main')

@section('title', 'Web Rekapitulasi')

@section('container-fluid')

<ul class="nav nav-tabs " id="myTab" role="tablist">
    <li class="nav-item " role="presentation">
        <a class="nav-link bg-primary text-white active" id="home-tab"
           data-toggle="tab" href="#home" role="tab"
           aria-controls="home" aria-selected="true">Peta</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link bg-success text-white" id="profile-tab"
           data-toggle="tab" href="#profile"
           role="tab" aria-controls="profile"
           aria-selected="false">Grafik</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div id="peta_persebaran_perumahan"></div>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script
            src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
        </script>
        <script src="../../assets/js/gmap/gmaps.js"></script>

        <style type="text/css">
            #peta_persebaran_perumahan {
                border: 5px solid #6c757d;
                border-radius: 10px;
                width: 100%;
                height: 700px;
                margin: 5px;
            }
        </style>

        <!--  KOORDINAT PERUMAHAN  -->
        <script type="text/javascript">
            var data_koordinat_perumahan = <?php print_r(json_encode($data_koordinat_perumahan)) ?>;
            var data_koordinat_perumahan_group_by = <?php print_r(json_encode($data_koordinat_perumahan_group_by)) ?>;

            var mymap = new GMaps({
                el: '#peta_persebaran_perumahan',
                lat: -6.485213,
                lng: 106.753537,
                zoom: 12
            });

            var path = {};
            var latitude;
            var longitude;
            var perumahanId = []

            function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;
            }

            for (let perumahan = 0; perumahan < data_koordinat_perumahan.length; perumahan++) {
                const perumahan_id = data_koordinat_perumahan[perumahan].perumahan_id;
                perumahanId.push(perumahan_id);
            }
            console.log('perumahan_id', perumahanId)

            var unique = perumahanId.filter(onlyUnique);
            console.log('unique', unique)

            var result = data_koordinat_perumahan.reduce(function (r, a) {
                r[a.perumahan_id] = r[a.perumahan_id] || [];
                r[a.perumahan_id].push(a);
                return r;
            }, Object.create(null));
            console.log('result', result);

            for (let u = 0; u < unique.length; u++) {
                var coord = {};
                path[u] = [];
                for (var j = 0; j < result[unique[u]].length; j++) {
                    const lt = parseFloat(result[unique[u]][j].latitude);
                    const ltd = parseFloat(result[unique[u]][j].longitude);
                    coord[j] = [lt, ltd];
                    path[u].push(coord[j]);
                }
            }

            // console.log("PATH", path)

            $.each(unique, function (index, value) {
                $.each(path, function (i, v) {
                    console.log("PATH V", v)
                    mymap.drawPolygon({
                        paths: v,
                        strokeColor: '#878787',
                        strokeOpacity: 0.5,
                        strokeWeight: 1,
                        fillColor: '#2bcfff',
                        fillOpacity: 0.2,
                        click: function () {
                            $("#review_perumahan" + data_koordinat_perumahan_group_by[i].id).modal('show');

                        }
                    });
                });
            })
        </script>

        <!--        KOORDINAT SARANA -->
        <script type="text/javascript">

            var data_koordinat_sarana = <?php print_r(json_encode($data_koordinat_sarana)) ?>;
            var data_koordinat_sarana_group_by = <?php print_r(json_encode($data_koordinat_sarana_group_by)) ?>;

            var path_sarana = {};
            var latitude_sarana;
            var longitude_sarana;
            var saranaId = []

            function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;
            }

            for (let sarana = 0; sarana < data_koordinat_sarana.length; sarana++) {
                const sarana_id = data_koordinat_sarana[sarana].sarana_id;
                saranaId.push(sarana_id);
            }
            var unique_sarana = saranaId.filter(onlyUnique);
            // console.log('unique', unique)

            var result_sarana = data_koordinat_sarana.reduce(function (x, y) {
                x[y.sarana_id] = x[y.sarana_id] || [];
                x[y.sarana_id].push(y);
                return x;
            }, Object.create(null));
            console.log('result', result_sarana);
            for (let p = 0; p < unique_sarana.length; p++) {
                var coord_sarana = {};
                path_sarana[p] = [];
                for (var s = 0; s < result_sarana[unique_sarana[p]].length; s++) {
                    const lt_sarana = parseFloat(result_sarana[unique_sarana[p]][s].latitude);
                    const ltd_sarana = parseFloat(result_sarana[unique_sarana[p]][s].longitude);
                    coord_sarana[s] = [lt_sarana, ltd_sarana];
                    path_sarana[p].push(coord_sarana[s]);
                }
            }
            $.each(unique_sarana, function (index, value) {
                $.each(path_sarana, function (i, v) {
                    mymap.drawPolygon({
                        paths: v,
                        strokeColor: '#a9a9a9',
                        strokeOpacity: 0.5,
                        strokeWeight: 2,
                        fillColor: '#f2e02b',
                        fillOpacity: 0.2,
                        click: function () {
                            $("#review_sarana" + data_koordinat_sarana_group_by[i].sarana_id).modal('show');

                        }
                    });
                });
            });
        </script>
        <!--        END KOORDINAT SARANA-->

        <!--        KOORDINAT JALAN SALURAN -->

        <script type="text/javascript">
            var data_koordinat_jalansaluran = <?php print_r(json_encode($data_koordinat_jalansaluran)) ?>;
            var data_koordinat_jalansaluran_group_by = <?php print_r(json_encode($data_koordinat_jalansaluran_group_by)) ?>;

            var path = {};
            var latitude;
            var longitude;
            var jalansaluranId = []

            function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;
            }

            for (let jalansaluran = 0; jalansaluran < data_koordinat_jalansaluran.length; jalansaluran++) {
                const jalansaluran_id = data_koordinat_jalansaluran[jalansaluran].jalansaluran_id;
                // console.log('jalansaluran_id', jalansaluran_id)
                jalansaluranId.push(jalansaluran_id);
            }

            var result = data_koordinat_jalansaluran.reduce(function (r, a) {
                r[a.jalansaluran_id] = r[a.jalansaluran_id] || [];
                r[a.jalansaluran_id].push(a);
                return r;
            }, Object.create(null));
            // console.log('result', result);

            var unique = jalansaluranId.filter(onlyUnique);
            // console.log('unique', unique)

            for (let u = 0; u < unique.length; u++) {
                var coord = {};
                path[u] = [];
                for (var j = 0; j < result[unique[u]].length; j++) {
                    const lt = parseFloat(result[unique[u]][j].latitude);
                    const ltd = parseFloat(result[unique[u]][j].longitude);
                    coord[j] = [lt, ltd];
                    path[u].push(coord[j]);
                }
            }

            $.each(unique, function (index, value) {
                $.each(path, function (i, v) {
                    mymap.drawPolyline({
                        path: v,
                        strokeColor: '#6b6b6b',
                        strokeOpacity: 0.5,
                        strokeWeight: 6,
                        click: function () {
                            $("#review_jalansaluran" + data_koordinat_jalansaluran_group_by[i].jalansaluran_id).modal('show');

                        }
                    });
                })
            })
        </script>
        <!--        END KOORDINAT JALAN SALURAN-->

        <!--        KOORDINAT TAMAN -->
        <script type="text/javascript">
            var data_koordinat_taman = <?php print_r(json_encode($data_koordinat_taman)) ?>;
            var data_koordinat_taman_group_by = <?php print_r(json_encode($data_koordinat_taman_group_by)) ?>;

            var path = {};
            var latitude;
            var longitude;
            var tamanId = []

            function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;
            }

            for (let taman = 0; taman < data_koordinat_taman.length; taman++) {
                const taman_id = data_koordinat_taman[taman].taman_id;
                tamanId.push(taman_id);
            }
            var unique = tamanId.filter(onlyUnique);
            // console.log('unique', unique)

            var result = data_koordinat_taman.reduce(function (r, a) {
                r[a.taman_id] = r[a.taman_id] || [];
                r[a.taman_id].push(a);
                return r;
            }, Object.create(null));
            console.log('result', result);
            for (let u = 0; u < unique.length; u++) {
                var coord = {};
                path[u] = [];
                for (var j = 0; j < result[unique[u]].length; j++) {
                    const lt = parseFloat(result[unique[u]][j].latitude);
                    const ltd = parseFloat(result[unique[u]][j].longitude);
                    coord[j] = [lt, ltd];
                    path[u].push(coord[j]);
                }
            }
            $.each(unique, function (index, value) {
                $.each(path, function (i, v) {
                    // console.log(v)
                    mymap.drawPolygon({
                        paths: v,
                        strokeColor: '#778899',
                        strokeOpacity: 0.5,
                        strokeWeight: 2,
                        fillColor: '#008000',
                        fillOpacity: 0.25,
                        click: function () {
                            $("#review_taman" + data_koordinat_taman_group_by[i].taman_id).modal('show');

                        }
                    });
                })
            })

        </script>
        <!--        -->

        <!--    POPUP KOORDINAT PERUMAHAN -->
        @foreach($data_koordinat_perumahan_group_by as $koordinat_perumahan)
        <p>ID Perumaha {{$koordinat_perumahan->id}}</p>

        <div class="modal fade" id="review_perumahan{{$koordinat_perumahan->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">{{$koordinat_perumahan->nama_perumahan}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b>Perumahan ID:</b>
                            {{$koordinat_perumahan->id}}
                        </p>

                        <p><b>Alamat Lokasi :</b><br>
                            {{$koordinat_perumahan->nama_perumahan}}, {{$koordinat_perumahan->kecamatan}},
                            {{$koordinat_perumahan->kelurahan}}, {{$koordinat_perumahan->lokasi}}
                        </p>

                        <p><b>Status Perumahan :</b>
                            {{$koordinat_perumahan->status_perumahan}}
                        </p>
                        <p><b>Informasi Perumahan</b><br>
                            Nama Pengembang : {{$koordinat_perumahan->nama_pengembang }}<br>
                            Luas Perumahan : {{$koordinat_perumahan->luas_perumahan }} /(m2)<br>
                            Jumlah Perumahan : {{$koordinat_perumahan->jumlah_perumahan }}<br>
                        </p>
                        <p>
                            <b>Koordinat : </b><br>
                            @foreach($data_koordinat_perumahan as $perumahan)
                            @if($perumahan->id == $koordinat_perumahan->perumahan_id)

                            {{$perumahan->latitude}} , {{$perumahan->longitude}}

                            @endif
                            @endforeach
                        </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('PSU_Perumahan.rekapitulasi.grafik.grafik_perumahan')
    </div>
</div>

@endsection
