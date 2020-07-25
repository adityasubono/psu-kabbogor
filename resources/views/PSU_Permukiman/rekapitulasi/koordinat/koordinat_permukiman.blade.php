<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gray-500">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Peta </h6>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div id="mymap"></div>
    </div>
</div>


<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
</script>
<script src="../../assets/js/gmap/gmaps.js"></script>
<style type="text/css">
    #mymap {
        border: 1px solid red;
        width: 100%;
        height: 400px;
    }
</style>


<style type="text/css"> .labels {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 4px;
        color: white;
        padding: 4px;
    } </style>`

<script type="text/javascript">
    var locations = <?php print_r(json_encode($koordinattpus)) ?>;
    var mymap = new GMaps({
        el: '#mymap',
        lat: -6.485213,
        lng: 106.753537,
        zoom: 12
    });

    $.each(locations, function (index, value) {
        mymap.addMarker({
            lat: value.latitude,
            lng: value.longitude,
            name: value.nama_tpu,
            title: value.id,
            infoWindow: {
                content: ' <div id="content">' +
                    '<div id="siteNotice">'+
                    '<h5 id="firstHeading" class="firstHeading">'+ value.nama_tpu +'</h5>'+
                    '<div id="bodyContent">'+
                    '<p><b>Lokasi Alamat : </b>'+ value.lokasi + ' ,' + value.kecamatan + ' ,'
                    + value.kelurahan + ' RW :' + value.RW +' / RT:'+ value.RT +'</p>'+
                    '</div>'+ '</div>',
                maxWidth: 700
            }
        });
    });

</script>


