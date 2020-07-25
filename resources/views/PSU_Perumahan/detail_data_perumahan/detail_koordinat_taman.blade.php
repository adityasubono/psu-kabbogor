@extends('layouts/main')

@section('title', 'Peta Koordinat Taman dan Penghijauan ')

@section('container-fluid')


<div class="card">
    <h4 class="ml-3">Peta Persebaran Data Taman dan Penghijauan</h4>
    <div id="peta_persebaran_taman"></div>
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
                                <p class="card-text">Kondisi taman dan penghijauan dalam keadaan baik.</p>
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
                                <p class="card-text">Kondisi taman dan penghijauan dalam keadaan rusak ringan.</p>
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
                                <p class="card-text">Kondisi taman dan penghijauan dalam keadaan rusak berat</p>
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
    #peta_persebaran_taman {
        border: 5px solid #6c757d;
        border-radius: 10px;
        width: 100%;
        height: 700px;
        margin: 5px;
    }
</style>


<script type="text/javascript">

    var data_koordinat_taman = <?php print_r(json_encode($data_koordinat_taman)) ?>;
    var data_koordinat_taman_group_by = <?php print_r(json_encode($data_koordinat_taman_group_by)) ?>;
    var mymap = new GMaps({
        el: '#peta_persebaran_taman',
        lat: -6.485213,
        lng: 106.753537,
        zoom: 12
    });


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

            if(data_koordinat_taman_group_by[i].kondisi_taman == 'Baik'){
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
            }else if (data_koordinat_taman_group_by[i].kondisi_taman == 'Rusak Ringan'){
                mymap.drawPolygon({
                    paths: v,
                    strokeColor: '#778899',
                    strokeOpacity: 0.5,
                    strokeWeight: 2,
                    fillColor: '#ffff00',
                    fillOpacity: 0.25,
                    click: function () {
                        $("#review_taman" + data_koordinat_taman_group_by[i].taman_id).modal('show');

                    }
                });
            }else {
                mymap.drawPolygon({
                    paths: v,
                    strokeColor: '#778899',
                    strokeOpacity: 0.5,
                    strokeWeight: 2,
                    fillColor: '#ff0000',
                    fillOpacity: 0.25,
                    click: function () {
                        $("#review_taman" + data_koordinat_taman_group_by[i].taman_id).modal('show');

                    }
                });
            }
        })
    })

</script>

@foreach($data_koordinat_taman_group_by as $groupby)
<div class="modal fade" id="review_taman{{$groupby->taman_id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Kawasan: {{$groupby->nama_taman}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>ID Taman dan Penghijauan : </b>{{$groupby->taman_id}}</p>
                <p><b>Alamat Lokasi :</b><br>
                    {{$groupby->nama_perumahan}}, {{$groupby->kecamatan}}, {{$groupby->kelurahan}}, {{$groupby->lokasi}}
                </p>

                <p><b>Luas Taman :</b> {{$groupby->luas_taman}} /(m2)<br>
                    <b>Kondisi Taman :</b> {{$groupby->kondisi_taman}}
                </p>

                <p>
                    <b>Koordinat : </b><br>
                    @foreach($data_koordinat_taman as $koordinat_taman)
                    @if($koordinat_taman->taman_id === $groupby->taman_id)
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

