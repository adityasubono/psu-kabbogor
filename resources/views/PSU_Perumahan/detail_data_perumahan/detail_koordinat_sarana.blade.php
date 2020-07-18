@extends('layouts/main')

@section('title', 'Peta Koordinat Sarana ')

@section('container-fluid')

<div class="card">
    <h4 class="ml-3">Peta Persebaran Data Sarana Perumahan</h4>
    <div id="peta_persebaran_sarana"></div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
            <tr>
                <th scope="col" rowspan="2">No.</th>
                <th scope="col" rowspan="2">Nama Sarana</th>
                <th scope="col" rowspan="2">Luas Sarana</th>
                <th scope="col" rowspan="2">Kondisi Sarana</th>
                <th scope="col" colspan="2" class="text-center">Koordinat</th>
            </tr>
            <tr>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
            </tr>
            </thead>
            <tbody>

            @foreach( $data_koordinat_sarana as $koordinat_sarana )

            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$koordinat_sarana->nama_sarana}}</td>
                <td>{{$koordinat_sarana->luas_sarana}}</td>
                <td>{{$koordinat_sarana->kondisi_sarana}}</td>
                <td>{{$koordinat_sarana->latitude}}</td>
                <td>{{$koordinat_sarana->longitude}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


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
    console.log("data_koordinat_sarana",data_koordinat_sarana_group_by)

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    for (let sarana = 0; sarana < data_koordinat_sarana.length; sarana++) {
        const sarana_id = data_koordinat_sarana[sarana].sarana_id;
        saranaId.push(sarana_id);
    }
    var unique = saranaId.filter(onlyUnique);
    console.log('unique', unique)

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
                    strokeColor: '#000000',
                    strokeOpacity: 0.3,
                    strokeWeight: 2,
                    fillColor: '#00e676',
                    fillOpacity: 0.4,
                    click: function () {
                        alert('Nama Sarana ' + data_koordinat_sarana_group_by[i].nama_sarana)
                    }
                })

        })
    })

</script>

@if(isset( $koordinat))
<a href="/koordinatsarana/{{$koor->sarana_id}}" class="btn btn-info btn-icon-split my-3">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-alt-circle-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
@endif
@endsection
