<div id="mymap"></div>

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


<script type="text/javascript">
    var locations = <?php print_r(json_encode($koor_pertamanan)) ?>;
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
            title: value.id,
            infoWindow: {
                content: ' <div id="content">' +
                    '<div id="siteNotice">'+
                    '<h5 id="firstHeading" class="firstHeading">'+ value.nama_taman +'</h5>'+
                    '<div id="bodyContent">'+
                    '<p><b>Lokasi Alamat : </b>'+ value.lokasi + ' ,' + value.kecamatan + ' ,'
                    + value.kelurahan + ' RW :' + value.RW +' / RT:'+ value.RT +'</p>'+
                    '</div>'+ '</div>',
                maxWidth: 400
            }
        });
    });

</script>


