<hr>
<h5 class="mt-3">Data Koordinat Permukiman</h5>
@if(isset($data_koordinat_tpu))
<div id="mymap"></div>
@else
<b style="color: red">Data Tidak Tersedia</b>
@endif
<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
</script>
<script src="../../assets/js/gmap/gmaps.js"></script>
<style type="text/css">
    #mymap {
        border: 1px solid red;
        width: 950px;
        height: 500px;
    }
</style>

<style> #map {
        display: block;
        width: 98%;
        height: 500px;
        margin: 0 auto;
    } </style>
<style type="text/css"> .labels {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 4px;
        color: white;
        padding: 4px;
    } </style>`

<script type="text/javascript">
    var locations = <?php print_r(json_encode($data_koordinat_tpu)) ?>;
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
                content: '<h6>' + value.latitude + ', ' + value.longitude + '</h6>',
                maxWidth: 400
            }
        });
    });

</script>

