@extends('layouts/main')

@section('title', 'Web Rekapitulasi')

@section('container-fluid')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h4>Grafik Data Perumahan</h4>
                @include('PSU_Perumahan.rekapitulasi.grafik.grafik_perumahan')
            </div>
            <div class="col-6">
                <h4>Peta Persebaran Perumahan</h4>
                <div id="peta_persebaran_perumahan"></div>
            </div>
        </div>
    </div>
</div>

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
        height: 620px;
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
    // console.log('perumahan_id', perumahanId)

    var unique = perumahanId.filter(onlyUnique);
    // console.log('unique', unique)

    var result = data_koordinat_perumahan.reduce(function (r, a) {
        r[a.perumahan_id] = r[a.perumahan_id] || [];
        r[a.perumahan_id].push(a);
        return r;
    }, Object.create(null));
    // console.log('result', result);


    for (let u = 0; u < unique.length; u++) {
        var coord = {};
        path[unique[u]] = [];
        for (var j = 0; j < result[unique[u]].length; j++) {
            const lt = parseFloat(result[unique[u]][j].latitude);
            const ltd = parseFloat(result[unique[u]][j].longitude);
            coord[j] = [lt, ltd];
            path[unique[u]].push(coord[j]);
        }
    }

    // console.log("PATH", path)

    $.each(unique, function (index, value) {
        // console.log("value unique", value)
        $.each(path, function (i, v) {
            // console.log("path v", i, "v " + v)
            mymap.drawPolygon({
                paths: v,
                strokeColor: '#878787',
                strokeOpacity: 0.5,
                strokeWeight: 1,
                fillColor: '#2bcfff',
                fillOpacity: 0.2,
                click: function () {
                    // console.log('ini', i + 'valueee' + v)
                    $("#review_perumahan" + i).modal('show');

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
    // console.log('result_sarana', result_sarana);
    for (let p = 0; p < unique_sarana.length; p++) {
        var coord_sarana = {};
        path_sarana[unique_sarana[p]] = [];
        for (var s = 0; s < result_sarana[unique_sarana[p]].length; s++) {
            const lt_sarana = parseFloat(result_sarana[unique_sarana[p]][s].latitude);
            const ltd_sarana = parseFloat(result_sarana[unique_sarana[p]][s].longitude);
            coord_sarana[s] = [lt_sarana, ltd_sarana];
            path_sarana[unique_sarana[p]].push(coord_sarana[s]);
        }
    }
    $.each(unique_sarana, function (index, value) {
        // console.log('sarana_uniq',value)
        $.each(path_sarana, function (i, v) {
            // console.log('sarana_i,',i +''+ v)
            mymap.drawPolygon({
                paths: v,
                strokeColor: '#a9a9a9',
                strokeOpacity: 0.5,
                strokeWeight: 2,
                fillColor: '#f2e02b',
                fillOpacity: 0.2,
                click: function () {

                    $("#review_sarana" + i).modal('show');

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
        path[unique[u]] = [];
        for (var j = 0; j < result[unique[u]].length; j++) {
            const lt = parseFloat(result[unique[u]][j].latitude);
            const ltd = parseFloat(result[unique[u]][j].longitude);
            coord[j] = [lt, ltd];
            path[unique[u]].push(coord[j]);
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
                    $("#review_jalansaluran" + i).modal('show');

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
    // console.log('result', result);
    for (let u = 0; u < unique.length; u++) {
        var coord = {};
        path[unique[u]] = [];
        for (var j = 0; j < result[unique[u]].length; j++) {
            const lt = parseFloat(result[unique[u]][j].latitude);
            const ltd = parseFloat(result[unique[u]][j].longitude);
            coord[j] = [lt, ltd];
            path[unique[u]].push(coord[j]);
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
                    $("#review_taman" + i).modal('show');

                }
            });
        })
    })

</script>
<!--        -->

<!--    POPUP KOORDINAT PERUMAHAN -->
@foreach($data_koordinat_perumahan_group_by as $koordinat_perumahan)
<!--<p>{{$koordinat_perumahan->perumahan_id}}</p>-->
<div class="modal fade" id="review_perumahan{{$koordinat_perumahan->perumahan_id}}" tabindex="-1" role="dialog"
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

<!-- POPUP SARANA -->
@foreach($data_koordinat_sarana_group_by as $groupby_sarana)
<!--<p>{{$groupby_sarana->sarana_id}}</p>-->
<div class="modal fade" id="review_sarana{{$groupby_sarana->sarana_id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">{{$groupby_sarana->nama_sarana}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>ID Sarana : </b>
                    {{$groupby_sarana->sarana_id}}
                </p>
                <p><b>Alamat Lokasi :</b><br>
                    {{$groupby_sarana->nama_perumahan}}, {{$groupby_sarana->kecamatan}},
                    {{$groupby_sarana->kelurahan}}, {{$groupby_sarana->lokasi}}
                </p>

                <p>
                    <b>Koordinat : </b> {{$groupby_sarana->latitude}} , {{$groupby_sarana->longitude}}
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!--        POPUP JALANSALURAN    -->
@foreach($data_koordinat_jalansaluran_group_by as $groupby_jalansaluran)

<div class="modal fade" id="review_jalansaluran{{$groupby_jalansaluran->jalansaluran_id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Nama Jalan :
                    {{$groupby_jalansaluran->nama_jalan_saluran}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>ID Jalan Saluran: </b>{{$groupby_jalansaluran->jalansaluran_id}}</p>
                <p><b>Alamat Lokasi :</b><br>
                    {{$groupby_jalansaluran->nama_perumahan}}, {{$groupby_jalansaluran->kecamatan}},
                    {{$groupby_jalansaluran->kelurahan}}, {{$groupby_jalansaluran->lokasi}}
                </p>

                <p><b>Luas Jalan Saluran :</b> {{$groupby_jalansaluran->luas_jalan_saluran}} /(m2)<br>
                    <b>Kondisi Jalan Saluran :</b> {{$groupby_jalansaluran->kondisi_jalan_saluran}}
                </p>

                <p>
                    <b>Koordinat : </b><br>
                    @foreach($data_koordinat_jalansaluran as $koordinat_jalansaluran)
                    @if($koordinat_jalansaluran->jalansaluran_id === $groupby_jalansaluran->jalansaluran_id)
                    {{$koordinat_jalansaluran->latitude}} , {{$koordinat_jalansaluran->longitude}}
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

<!--POPUP KOORDINAT TAMAN DAN PENGHIJAUAN-->

@foreach($data_koordinat_taman_group_by as $groupby_taman)

<div class="modal fade" id="review_taman{{$groupby_taman->taman_id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Kawasan: {{$groupby_taman->nama_taman}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>ID Taman dan Penghijauan : </b>{{$groupby_taman->taman_id}}</p>
                <p><b>Alamat Lokasi :</b><br>
                    {{$groupby_taman->nama_perumahan}}, {{$groupby_taman->kecamatan}},
                    {{$groupby_taman->kelurahan}}, {{$groupby_taman->lokasi}}
                </p>

                <p><b>Luas Taman :</b> {{$groupby_taman->luas_taman}} /(m2)<br>
                    <b>Kondisi Taman :</b> {{$groupby_taman->kondisi_taman}}
                </p>

                <p>
                    <b>Koordinat : </b><br>
                    @foreach($data_koordinat_taman as $koordinat_taman)
                    @if($koordinat_taman->taman_id === $groupby_taman->taman_id)
                    {{$koordinat_taman->latitude}} , {{$koordinat_taman->longitude}}
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

@endsection
