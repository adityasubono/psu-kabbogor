<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


<style type="text/css">
    #mymap1 {
        border:1px solid red;
        width: 800px;
        height: 500px;
    }
</style>



<h1>Laravel 5 - Multiple markers in google map using gmaps.js</h1>


<div id="mymap1"></div>


<script type="text/javascript">


    var locations = <?php print_r(json_encode($koor_pertamanan)) ?>;


    var mymap = new GMaps({
        el: '#mymap1',
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
                    '<h4 id="firstHeading" class="firstHeading">'+ value.nama_taman +'</h4>'+
                    '<div id="bodyContent">'+
                    '<p><b>Lokasi Alamat : </b>'+ value.lokasi + ' ,' + value.kecamatan + ' ,'
                    + value.kelurahan + ' RW :' + value.RW +' / RT:'+ value.RT +'</p>'+
                    '</div>'+ '</div>',
                maxWidth: 400
            }
        });
    });


</script>
