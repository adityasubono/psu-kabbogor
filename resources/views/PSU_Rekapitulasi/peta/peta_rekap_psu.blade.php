<div id="map-container-google-2" class="z-depth-1-half map-container-2"
     style="height:500px">

    <div id="googleMap" style="width:100%;height:500px;"></div>


    <div class="container-fluid">
        <script
            src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM">
        </script>
        <script>
            var marker, marker1;
            var infowindow;
            var contentString;
            var locations = <?php print_r(json_encode($locations_permukiman))?>;
            var pertamanan = <?php print_r(json_encode($locations_pertamanan))?>;

            function initialize() {

                var propertiPeta = {
                    center: new google.maps.LatLng(-6.485219, 106.752375),
                    zoom: 14,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,

                };

                var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

                google.maps.event.addListener(peta, 'click', function (event) {
                    taruhMarker(this, event.latLng);

                });

                //PERMUKIMAN PETA.................
                var icon = {
                    url: "assets/images/permukiman.png", // url
                    scaledSize: new google.maps.Size(30, 30), // scaled size
                    origin: new google.maps.Point(0, 0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                };

                // membuat Marker
                for (i = 0; i < locations.length; i++) {
                    marker1 = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i].latitude,
                            locations[i].longitude),
                        map: peta,
                        icon: icon,
                        title: 'Permukiman',
                    });
                }

                //PETAMANAN PETA.................
                var icon_pertamanan = {
                    url: "assets/images/pine-1577.png", // url
                    scaledSize: new google.maps.Size(35, 35), // scaled size
                    origin: new google.maps.Point(0, 0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                };

                // membuat Marker
                for (i = 0; i < pertamanan.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pertamanan[i].latitude,
                            pertamanan[i].longitude),
                        map: peta,
                        icon: icon_pertamanan,
                        title : "Pertamanan",
                    });
                }

            }

            // event jendela di-load
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>


    </div>

</div>
<script src="../../assets/js/gmap/gmaps.js"></script>
