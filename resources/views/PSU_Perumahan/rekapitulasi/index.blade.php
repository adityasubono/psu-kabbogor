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


        <script type="text/javascript">
            var data_koordinat_perumahan = <?php print_r(json_encode($data_koordinat_perumahan)) ?>;

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

            console.log("PATH", path)

            $.each(unique, function (index, value) {
                $.each(path, function (i, v) {
                    console.log("PATH V", v)
                    mymap.drawPolygon({
                        paths: v,
                        strokeColor: '#000000',
                        strokeOpacity: 0.5,
                        strokeWeight: 1,
                        fillColor: '#a4c639',
                        fillOpacity: 0.2
                    });
                });
            })


        </script>



    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('PSU_Perumahan.rekapitulasi.grafik.grafik_perumahan')
    </div>
</div>

@endsection
