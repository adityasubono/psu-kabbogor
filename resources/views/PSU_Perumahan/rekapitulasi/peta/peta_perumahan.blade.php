<div id="mymap"></div>


<style type="text/css">
    #mymap {
        border: 1px solid red;
        width: 100%;
        height: 600px;
    }
</style>

<script type="text/javascript">
    var locations = <?php print_r(json_encode($koordinat_perumahan)) ?>;
    var perumahans = <?php print_r(json_encode($perumahans_gua)) ?>;
    var polygons = {};
    var infowindow = {};
    var bounds = {};
    var cords = {};
    var coord = {};
    const perumahan_id = [];
    console.log('perumahans', perumahans)

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    for (let perumahan = 0; perumahan < locations.length; perumahan++) {
        const perumahanId = locations[perumahan].perumahan_id;
        perumahan_id.push(perumahanId);
    }
    var unique = perumahan_id.filter(onlyUnique);
    var result = locations.reduce(function (r, a) {
        r[a.perumahan_id] = r[a.perumahan_id] || [];
        r[a.perumahan_id].push(a);
        return r;
    }, Object.create(null));
    console.log('result', result);
    for (let u = 0; u < unique.length; u++) {
        cords[u] = [];
        for (var j = 0; j < result[unique[u]].length; j++) {
            const lt = parseFloat(result[unique[u]][j].latitude);
            const ltd = parseFloat(result[unique[u]][j].longitude);
            coord[j] = {lat: lt, lng: ltd};
            cords[u].push(coord[j]);
        }
    }

    function initMap() {
        var map = new google.maps.Map(document.getElementById('mymap'), {
            zoom: 12,
            center: {
                lat: -6.485213,
                lng: 106.753537,
            },
        });
        // Construction of polygon.
        for (let u = 0; u < unique.length; u++) {
            for (var j = 0; j < result[unique[u]].length; j++) {
                polygons[u] = new google.maps.Polygon({
                    paths: cords[u],
                    strokeColor: '#0000FF',
                    strokeOpacity: 0.6,
                    strokeWeight: 1,
                    fillColor: '#7FFF00',
                    fillOpacity: 0.10
                });
                polygons[u].setMap(map);
                bounds[u] = new google.maps.LatLngBounds();
                for (var i = 0; i < polygons[u].getPath().getLength(); i++) {
                    bounds[u].extend(polygons[u].getPath().getAt(i));
                }

                infowindow[u] = new google.maps.InfoWindow();
                infowindow[u].opened = false;

                function mousefn(evt) {
                    infowindow[u].setContent(
                        '<div id="content">' +
                        '<div id="siteNotice"></div>' +
                        '<h3 id="firstHeading" class="firstHeading">'
                        + result[unique[u]][1].nama_perumahan +
                        '</h3>' +
                        '<div id="bodyContent">' +
                        '<p style="font-size: 15px"><b>Alamat : </b>' + result[unique[u]][1]
                            .lokasi + ' ,'
                        + result[unique[u]][1].kelurahan + ' ,' + result[unique[u]][1].kecamatan
                        + ' ,RT: '
                        + result[unique[u]][1].RT + ' / RW: ' + result[unique[u]][1].RW + '</p>' +
                        '</div></div>');

                    infowindow[u].setPosition(bounds[u].getCenter());
                    infowindow[u].open(map);
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


<script type="text/javascript">
    var sarana = <?php print_r(json_encode($koordinat_sarana)) ?>;
    var perumahan_saranas = <?php print_r(json_encode($saranas)) ?>;
    var polygons_sarana = {};
    var infowindow_sarana = {};
    var bounds_sarana = {};
    var cords_sarana = {};
    var coord_sarana = {};
    const perumahan_id_sarana = [];
    console.log('perumahans_sarana', sarana)

    function onlyUniqueSarana(value, index, self) {
        return self.indexOf(value) === index;
    }

    for (let perumahan = 0; perumahan < sarana.length; perumahan++) {
        const perumahanId = sarana[perumahan].perumahan_id_sarana;
        perumahan_id_sarana.push(perumahanId);
    }
    var unique_sarana = perumahan_id_sarana.filter(onlyUniqueSarana);
    var result_sarana = sarana.reduce(function (r, a) {
        r[a.perumahan_id_sarana] = r[a.perumahan_id_sarana] || [];
        r[a.perumahan_id_sarana].push(a);
        return r;
    }, Object.create(null));
    console.log('result', result_sarana);
    for (let a = 0; a < unique_sarana .length; a++) {
        cords_sarana[a] = [];
        for (var b = 0; b < result_sarana[unique_sarana [a]].length; b++) {
            const lt = parseFloat(result_sarana[unique_sarana[a]][b].latitude);
            const ltd = parseFloat(result_sarana[unique_sarana[a]][b].longitude);
            coord_sarana [b] = {lat: lt, lng: ltd};
            cords_sarana[a].push(coord_sarana [b]);
        }
    }

    function initMap() {
        var map = new google.maps.Map(document.getElementById('mymap'), {
            zoom: 12,
            center: {
                lat: -6.485213,
                lng: 106.753537,
            },
        });
        // Construction of polygon.
        for (let u = 0; u < unique_sarana.length; u++) {
            for (var j = 0; j < result_sarana[unique_sarana[u]].length; j++) {
                polygons_sarana[u] = new google.maps.Polygon({
                    paths: cords_sarana[u],
                    strokeColor: '#0000FF',
                    strokeOpacity: 0.6,
                    strokeWeight: 1,
                    fillColor: '#7FFF00',
                    fillOpacity: 0.10
                });
                polygons_sarana[u].setMap(map);
                bounds_sarana[u] = new google.maps.LatLngBounds();
                for (var i = 0; i < polygons_sarana[u].getPath().getLength(); i++) {
                    bounds_sarana[u].extend(polygons_sarana[u].getPath().getAt(i));
                }

                infowindow_sarana[u] = new google.maps.InfoWindow();
                infowindow_sarana[u].opened = false;

                function mousefn(evt) {
                    infowindow_sarana[u].setContent(
                        '<div id="content">' +
                        '<div id="siteNotice"></div>' +
                        '<h3 id="firstHeading" class="firstHeading"> Sarana : '
                        + result_sarana[unique_sarana[u]][1].nama_perumahan +
                        '</h3>' +
                        '<div id="bodyContent">' +
                        '<p style="font-size: 15px"><b>Alamat : </b>' + result_sarana[unique_sarana[u]][1]
                            .lokasi + ' ,'
                        + result_sarana[unique_sarana[u]][1].kelurahan + ' ,' + result_sarana[unique_sarana[u]][1].kecamatan
                        + ' ,RT: '
                        + result_sarana[unique_sarana[u]][1].RT + ' / RW: ' + result_sarana[unique_sarana[u]][1].RW + '</p>' +
                        '</div></div>');

                    infowindow_sarana[u].setPosition(bounds_sarana[u].getCenter());
                    infowindow_sarana[u].open(map);
                }

                google.maps.event.addListener(polygons_sarana[u], 'mouseover', mousefn);
                // google.maps.event.addListener(mrpdPolygon, 'mousemove', mousefn);
                google.maps.event.addListener(polygons_sarana[u], 'mouseout', function (evt) {
                    infowindow_sarana[u].close();
                    infowindow_sarana[u].opened = false;
                });
            }
        }
    }
</script>


<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM&callback=initMap">
</script>
