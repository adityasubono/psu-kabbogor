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
            var propertiPeta = {
                center: new google.maps.LatLng(-6.485219, 106.752375),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,

            };
            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
            function initialize() {
                initMap();

                // google.maps.event.addListener(peta, 'click', function (event) {
                //     taruhMarker(this, event.latLng);
                //
                // });

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

            var locationspolygon = <?php print_r(json_encode($koordinat_perumahan)) ?>;
            var perumahans = <?php print_r(json_encode($perumahans)) ?>;
            var polygons={};
            var infowindow={};
            var bounds = {};
            var cords = {};
            var coord={};
            const perumahan_id = [];
            console.log('perumahans',perumahans)
            function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;
            }
            for(let perumahan=0; perumahan< locationspolygon.length;perumahan++){
                const perumahanId = locationspolygon[perumahan].perumahan_id;
                perumahan_id.push(perumahanId);
            }
            var unique = perumahan_id.filter( onlyUnique );
            var result = locationspolygon.reduce(function (r, a) {
                r[a.perumahan_id] = r[a.perumahan_id] || [];
                r[a.perumahan_id].push(a);
                return r;
            }, Object.create(null));
            console.log('result',result);
            for(let u=0;u< unique.length; u++){
                cords[u]=[];
                for (var j=0; j < result[unique[u]].length; j++) {
                    const lt = parseFloat(result[unique[u]][j].latitude);
                    const ltd = parseFloat(result[unique[u]][j].longitude);
                    coord[j] = {lat: lt, lng:ltd};
                    cords[u].push(coord[j]);
                }
            }


            function initMap() {
                // var map = new google.maps.Map(document.getElementById('mymap'), {
                //     zoom: 12,
                //     center: {
                //         lat: -6.485213,
                //         lng: 106.753537,
                //     },
                // });
                // Construction of polygon.
                for (let u = 0; u < unique.length; u++) {
                    for (var j=0; j < result[unique[u]].length; j++) {
                        polygons[u] = new google.maps.Polygon({
                            paths: cords[u],
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.6,
                            strokeWeight: 1,
                            fillColor: '#FF0000',
                            fillOpacity: 0.10
                        });
                        polygons[u].setMap(peta);
                        bounds[u] = new google.maps.LatLngBounds();
                        for (var i = 0; i < polygons[u].getPath().getLength(); i++) {
                            bounds[u].extend(polygons[u].getPath().getAt(i));
                        }

                        infowindow[u] = new google.maps.InfoWindow();
                        infowindow[u].opened = false;

                        function mousefn(evt) {
                            infowindow[u].setContent("<h5> Perumahan ID : "+ result[unique[u]][1].perumahan_id +
                                "</h5><div>" +
                                "</div>");
                            infowindow[u].setPosition(bounds[u].getCenter());
                            infowindow[u].open(peta);
                        }

                        google.maps.event.addListener(polygons[u], 'mouseover', mousefn);
                        // google.maps.event.addListener(mrpdPolygon, 'mousemove', mousefn);
                        google.maps.event.addListener(polygons[u], 'mouseout', function (evt) {
                            infowindow[u].close();
                            infowindow[u].opened = false;
                        });
                    }
                }
            }
        </script>
    </div>

</div>
<script src="../../assets/js/gmap/gmaps.js"></script>
