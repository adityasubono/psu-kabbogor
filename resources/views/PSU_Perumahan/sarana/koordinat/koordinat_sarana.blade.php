@extends('layouts/main')

@section('title', 'Koordinat Sarana Perumahan')

@section('container-fluid')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="card mb-3">
        <div id="mymap" style="width:100%;height:600px;"></div>
        <div class="card-body">
            <form method="post" action="/koordinatsarana/store" enctype="multipart/form-data">
                @csrf
                <h5 class="card-title bg-success p-3 text-white">
                    Data Koordinat Sarana Perumahan ||
                    ID Sarana : {{$data_sarana->id}} ||
                    ID Perumahan : {{$data_sarana->perumahan_id}} </h5>
                <input type="hidden" id="jumlah-form" value="0">
                <div id="sarana_form"></div>

                <input type="hidden" name="sarana_id" id="sarana_id"
                       value="{{$data_sarana->id}}">

                <input type="hidden" name="perumahan_id" id="perumahan_id"
                       value="{{$data_sarana->perumahan_id}}">

                <button type="submit" class="btn btn-primary btn-icon-split mt-3" id="reset_data">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                    <span class="text">Simpan</span>
                </button>

                <button type="button" class="btn btn-info btn-icon-split mt-3"
                        id="btn-reset-form" onclick="window.location.reload()">
                    <span class="icon text-white-50">
                        <i class="fas fa-sync"></i>
                    </span>
                    <span class="text">Reset</span>
                </button>
            </form>
        </div>
    </div>
    @include('PSU_Perumahan.sarana.koordinat.tabel_koordinat_sarana')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
</script>
<script src="../../assets/js/gmap/gmaps.js"></script>

<script type="text/javascript">
    var titik_koordinat_perumahan = <?php print_r(json_encode($data_koordinat_perumahan)) ?>;
    var mymap = new GMaps({
        el: '#mymap',
        lat: -6.485213,
        lng: 106.753537,
        zoom: 12
    });

    $.each(titik_koordinat_perumahan, function (index, value) {
        mymap.addMarker({
            lat: value.latitude,
            lng: value.longitude,
            label: '' + value.nama_perumahan + value.perumahan_id,
            title: 'Titik Ke - ' + index,
            infoWindow: {
                content: ' <div id="content">' +
                    '<div id="siteNotice">' +
                    '<h5 id="firstHeading" class="firstHeading">Perumahan Titik Ke -' + index + '</h5>' +
                    '<p>' + value.latitude + ',' + value.longitude + '</p>' +
                    '</div>',
                maxWidth: 400
            }
        });
    });

    var titik_koordinat_sarana = <?php print_r(json_encode($data_koordinat_sarana)) ?>;

    $.each(titik_koordinat_sarana, function (index, value) {
        mymap.addMarker({
            lat: value.latitude,
            lng: value.longitude,
            label: 'Sarana' + value.nama_perumahan,
            title: 'Titik Ke - ' + index,
            infoWindow: {
                content: ' <div id="content">' +
                    '<div id="siteNotice">' +
                    '<h5 id="firstHeading" class="firstHeading"> Titik Ke -' + index + '</h5>' +
                    '<p> ID Sarana :' +  value.sarana_id +'</p>' +
                    '<p>' + value.latitude + ',' + value.longitude + '</p>' +
                    '</div>',
                maxWidth: 400
            }
        });
    });


    var titik_koordinat_jalansaluran = <?php print_r(json_encode($data_koordinat_jalansaluran)) ?>;

    $.each(titik_koordinat_jalansaluran, function (index, value) {
        mymap.addMarker({
            lat: value.latitude,
            lng: value.longitude,
            label: 'Sarana' + index,
            title: 'Titik Ke - ' + index,
            infoWindow: {
                content: ' <div id="content">' +
                    '<div id="siteNotice">' +
                    '<h5 id="firstHeading" class="firstHeading"> Titik Ke -' + index + '</h5>' +
                    '<p>' + value.latitude + ',' + value.longitude + '</p>' +
                    '</div>',
                maxWidth: 400
            }
        });
    });

    var titik_koordinat_taman = <?php print_r(json_encode($data_koordinat_taman)) ?>;

    $.each(titik_koordinat_taman, function (index, value) {
        mymap.addMarker({
            lat: value.latitude,
            lng: value.longitude,
            label: 'Taman' + index,
            title: 'Titik Ke - ' + index,
            infoWindow: {
                content: ' <div id="content">' +
                    '<div id="siteNotice">' +
                    '<h5 id="firstHeading" class="firstHeading"> Titik Ke -' + index + '</h5>' +
                    '<p>' + value.latitude + ',' + value.longitude + '</p>' +
                    '</div>',
                maxWidth: 400
            }
        });
    });


</script>


<!--  KOORDINAT PERUMAHAN  -->

<script type="text/javascript">
    var data_koordinat_perumahan = <?php print_r(json_encode($data_koordinat_perumahan)) ?>;
    var data_koordinat_perumahan_group_by = <?php print_r(json_encode($data_koordinat_perumahan_group_by)) ?>;

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
            mymap.drawPolygon({
                paths: v,
                strokeColor: '#878787',
                strokeOpacity: 0.5,
                strokeWeight: 1,
                fillColor: '#2bcfff',
                label:'Perumahan',
                fillOpacity: 0.2,
                click: function () {
                    $("#review_perumahan" + data_koordinat_perumahan_group_by[i].id).modal('show');

                }
            });
        });
    })
</script>

<!--KOORDINAT SARANA PERUMAHAN-->
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
    console.log('result_sarana', result_sarana);
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

<!--KOORDINAT JALAN SALURAN-->
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

<!--KOORDINAT TAMAN DAN PENGHIJAUAN-->
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
<!-- AMBIL TITIK KOORDINAT -->
<script type="text/javascript">

    GMaps.on('click', mymap.map, function (event) {
        var index = mymap.markers.length;
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var c = jumlah + 1; // Tambah 1 untuk jumlah form nya
        var d = jumlah;

        var perumahan_id = $('#perumahan_id').val();
        var sarana_id = $('#sarana_id').val();

        $("#sarana_form").append(
            '<div id="data_koordinat_perumahan_append" class="mt-3 rounded">'
            + '<h5><b>Titik Koordinat Ke -' + index + '</b></h5>'
            + '<hr class="bg-gradient-primary">'
            + '<input type="text" class="form-control" id="perumahan_id"'
            + 'name="data_koordinat[' + d + '][perumahan_id]" '
            + 'value="' + perumahan_id + '">'

            + '<input type="text" class="form-control" id="sarana_id"'
            + 'name="data_koordinat[' + d + '][sarana_id]" '
            + 'value="' + sarana_id + '">'

            + '<input type="hidden" class="form-control"'
            + 'id="nama"name="data_koordinat[' + d + '][latitude]"'
            + 'value="' + event.latLng.lat() + '">'


            + '<p>' + event.latLng.lat() + ' , ' + event.latLng.lng()
            + '<button type="button" '
            + 'class="btn btn-danger btn-sm btn-icon-split mr-2'
            + ' remove-data-koordinat">'
            + '<span class="icon text-white-50">'
            + '<i class="fas fa-times"></i></span>'
            + '</button></p>'

            + '<input type="hidden" name="data_koordinat[' + d + '][longitude]" '
            + 'value="' + event.latLng.lng() + '"'
            + 'class="form-control" />'
            + '</div>')

        $(document).on('click', '.remove-data-koordinat', function () {
            $(this).parents('#data_koordinat_perumahan_append').remove();
        });


        $("#jumlah-form").val(c);// Ubah value textbox jumlah-form dengan


        mymap.addMarker({
            lat: lat,
            lng: lng,
            label: '' + index,
            title: 'Titik Nomer ' + index,
            infoWindow: {
                content: '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h5 id="firstHeading" class="firstHeading">Titik Ke - ' + index + '</h5>' +
                    '<h5 id="firstHeading" class="firstHeading">' + index + lat + ',' + lng + '</h5>' +
                    '<div id="bodyContent">' +
                    '</div>' +
                    '</div>',

            },
            rightclick: function (e) {
                alert('Hapus Titik Koordinat Ini');
            }
        });
    });
    $("#jumlah-form").val(d);

</script>

@endsection
