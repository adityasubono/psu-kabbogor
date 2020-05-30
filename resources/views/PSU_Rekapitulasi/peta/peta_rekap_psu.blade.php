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
                    center:new google.maps.LatLng(-6.485219,106.752375),
                    zoom:14,
                    mapTypeId:google.maps.MapTypeId.ROADMAP,

                };

                var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

                google.maps.event.addListener(peta, 'click', function(event) {
                    taruhMarker(this, event.latLng);

                });




                //PERMUKIMAN PETA.................
                var icon = {
                    url: "assets/images/camping-location-2958.png", // url
                    scaledSize: new google.maps.Size(35, 35), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0,0) // anchor
                };


                // membuat Marker
                for (i = 0; i < locations.length; i++) {
                    marker1 = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                        map: peta,
                        icon: icon,
                        title: 'Permukiman',
                    });

                    contentString = '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                        '<div id="bodyContent">'+
                        '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                        'sandstone rock formation in the southern part of the '+
                        'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                        'south west of the nearest large town, Alice Springs; 450&#160;km '+
                        '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                        'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                        'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                        'Aboriginal people of the area. It has many springs, waterholes, '+
                        'rock caves and ancient paintings. Uluru is listed as a World '+
                        'Heritage Site.</p>'+
                        '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                        'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                        '(last visited June 22, 2009).</p>'+
                        '</div>'+
                        '</div>';


                    infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    marker1.addListener('click', function() {
                        infowindow.open(peta, marker1);
                    });

                }


                //PETAMANAN PETA.................
                var icon_pertamanan = {
                    url: "assets/images/pine-1577.png", // url
                    scaledSize: new google.maps.Size(35, 35), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0,0) // anchor
                };


                // membuat Marker
                for (i = 0; i < pertamanan.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pertamanan[i].latitude, pertamanan[i].longitude),
                        map: peta,
                        icon: icon_pertamanan,
                    });
                }


            }

            // event jendela di-load
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>



    </div>

</div>
<script src="../../assets/js/gmap/gmaps.js"></script>
