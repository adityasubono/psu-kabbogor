@extends('layouts/main')

@section('title', 'Peta Koordinat Jalan dan Saluran ')

@section('container-fluid')


<div class="card">
    <h4 class="ml-3">Peta Persebaran Data Jalan dan Saluran</h4>
    <div id="peta_persebaran_jalansaluran"></div>
    <div class="card-body">
        <h5>Legenda</h5>

        <div class="row">
            <div class="col-4">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4 bg-success">

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Warna Hijau</h5>
                                <p class="card-text">Kondisi jalan dan saluran dalam keadaan baik.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4 bg-warning">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Warna Kuning</h5>
                                <p class="card-text">Kondisi jalan dan saluran dalam keadaan rusak ringan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4 bg-danger">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Warna Merah</h5>
                                <p class="card-text">Kondisi jalan dan saluran dalam keadaan rusak berat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="/perumahans/edit/{{$perumahans->id}}"
           class="btn btn-info btn-icon-split mt-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
            <span class="text">Kembali</span>
        </a>

    </div>
</div>


<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
</script>
<script src="../../assets/js/gmap/gmaps.js"></script>


<style type="text/css">
    #peta_persebaran_jalansaluran {
        border: 5px solid #6c757d;
        border-radius: 10px;
        width: 100%;
        height: 700px;
        margin: 5px;
    }
</style>


<script type="text/javascript">

    var data_koordinat_jalansaluran = <?php print_r(json_encode($data_koordinat_jalansaluran)) ?>;
    var data_koordinat_jalansaluran_group_by = <?php print_r(json_encode($data_koordinat_jalansaluran_group_by)) ?>;
    var mymap = new GMaps({
        el: '#peta_persebaran_jalansaluran',
        lat: -6.485213,
        lng: 106.753537,
        zoom: 12
    });

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
            if (data_koordinat_jalansaluran_group_by[i].kondisi_jalan_saluran_id === 'Baik') {
                mymap.drawPolyline({
                    path: v,
                    strokeColor: '#008000',
                    strokeOpacity: 0.5,
                    strokeWeight: 6,
                    click: function () {
                        $("#review_jalansaluran" + data_koordinat_jalansaluran_group_by[i].jalansaluran_id).modal('show');

                    }
                });
            }

            if (data_koordinat_jalansaluran_group_by[i].kondisi_jalan_saluran === 'Baik') {
                mymap.drawPolyline({
                    path: v,
                    strokeColor: '#008000',
                    strokeOpacity: 0.5,
                    strokeWeight: 6,
                    click: function () {
                        $("#review_jalansaluran" + data_koordinat_jalansaluran_group_by[i].jalansaluran_id).modal('show');

                    }
                });
            } else if (data_koordinat_jalansaluran_group_by[i].kondisi_jalan_saluran === 'Rusak Ringan') {
                mymap.drawPolyline({
                    path: v,
                    strokeColor: '#ffd700',
                    strokeOpacity: 0.5,
                    strokeWeight: 6,
                    click: function () {
                        $("#review_jalansaluran" + data_koordinat_jalansaluran_group_by[i].jalansaluran_id).modal('show');

                    }
                });
            } else {
                mymap.drawPolyline({
                    path: v,
                    strokeColor: '#ff0000',
                    strokeOpacity: 0.5,
                    strokeWeight: 6,
                    click: function () {
                        $("#review_jalansaluran" + data_koordinat_jalansaluran_group_by[i].jalansaluran_id).modal('show');

                    }
                });
            }
        })
    })
</script>

@foreach($data_koordinat_jalansaluran_group_by as $groupby)
<div class="modal fade" id="review_jalansaluran{{$groupby->jalansaluran_id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Nama Jalan : {{$groupby->nama_jalan_saluran}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>ID Jalan Saluran: </b>{{$groupby->jalansaluran_id}}</p>
                <p><b>Alamat Lokasi :</b><br>
                    {{$groupby->nama_perumahan}}, {{$groupby->kecamatan}}, {{$groupby->kelurahan}}, {{$groupby->lokasi}}
                </p>

                <p><b>Luas Taman :</b> {{$groupby->luas_jalan_saluran}} /(m2)<br>
                    <b>Kondisi Taman :</b> {{$groupby->kondisi_jalan_saluran}}
                </p>

                <p>
                    <b>Koordinat : </b><br>
                    @foreach($data_koordinat_jalansaluran as $koordinat_jalansaluran)
                    @if($koordinat_jalansaluran->jalansaluran_id === $groupby->jalansaluran_id)
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
@endsection

