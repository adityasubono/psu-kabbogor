@extends('layouts/main')

@section('title', 'Peta Koordinat Sarana ')

@section('container-fluid')

<div class="card">
    <h4 class="ml-3">Peta Persebaran Data Sarana Perumahan</h4>
    <div id="peta_persebaran_sarana"></div>
</div>
<a href="/perumahans/edit/{{$perumahans->id}}"
   class="btn btn-info btn-icon-split ml-2">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-alt-circle-left"></i>
        </span>
    <span class="text">Kembali</span>
</a>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
</script>
<script src="../../assets/js/gmap/gmaps.js"></script>


<style type="text/css">
    #peta_persebaran_sarana {
        border: 5px solid #6c757d;
        border-radius: 10px;
        width: 100%;
        height: 700px;
        margin: 5px;
    }
</style>


<script type="text/javascript">

    var data_koordinat_sarana = <?php print_r(json_encode($data_koordinat_sarana)) ?>;
    var data_koordinat_sarana_group_by = <?php print_r(json_encode($data_koordinat_sarana_group_by)) ?>;
    var mymap = new GMaps({
        el: '#peta_persebaran_sarana',
        lat: -6.485213,
        lng: 106.753537,
        zoom: 12
    });


    var path = {};
    var latitude;
    var longitude;
    var saranaId = []

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    for (let sarana = 0; sarana < data_koordinat_sarana.length; sarana++) {
        const sarana_id = data_koordinat_sarana[sarana].sarana_id;
        saranaId.push(sarana_id);
    }
    var unique = saranaId.filter(onlyUnique);
    // console.log('unique', unique)

    var result = data_koordinat_sarana.reduce(function (r, a) {
        r[a.sarana_id] = r[a.sarana_id] || [];
        r[a.sarana_id].push(a);
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
            console.log(v)
            mymap.drawPolygon({
                paths: v,
                strokeColor: '#a9a9a9',
                strokeOpacity: 0.5,
                strokeWeight: 2,
                fillColor: '#6495ed',
                fillOpacity: 0.5,
                click: function () {
                    $("#review_sarana"+data_koordinat_sarana_group_by[i].sarana_id).modal('show');

                }
            });
        })
    })

</script>

@foreach($data_koordinat_sarana_group_by as $groupby)
<div class="modal fade" id="review_sarana{{$groupby->sarana_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">{{$groupby->nama_sarana}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Alamat Lokasi :</b><br>
                {{$groupby->nama_perumahan}}, {{$groupby->kecamatan}}, {{$groupby->kelurahan}},  {{$groupby->lokasi}}
                </p>

                <p>
                    <b>Koordinat : </b> {{$groupby->latitude}} ,  {{$groupby->longitude}}
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@if(isset( $koordinat))
<a href="/koordinatsarana/{{$koor->sarana_id}}" class="btn btn-info btn-icon-split my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-alt-circle-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
@endif
@endsection
