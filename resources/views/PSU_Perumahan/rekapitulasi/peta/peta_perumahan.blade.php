<div id="mymap"></div>

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
    var locations = <?php print_r(json_encode($koordinat_perumahan)) ?>;
    var perumahans = <?php print_r(json_encode($perumahans)) ?>;
    var polygons={};
    var infowindow={};
    var bounds = {};
    var cords = {};
    var coord={};
    const perumahan_id = [];
    // var mymap = new GMaps({
    //     el: '#mymap',
    //     lat: -6.485213,
    //     lng: 106.753537,
    //     zoom: 12
    // });
    console.log('perumahans',perumahans)
    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }
    for(let perumahan=0; perumahan< locations.length;perumahan++){
        const perumahanId = locations[perumahan].perumahan_id;
        perumahan_id.push(perumahanId);
    }
    var unique = perumahan_id.filter( onlyUnique );
    var result = locations.reduce(function (r, a) {
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
            // polygons[u] = mymap.drawPolygon({
            //     paths: cords[u],
            //     strokeColor: '#000000',
            //     strokeOpacity: 0.3,
            //     strokeWeight: 2,
            //     fillColor: '#00e676',
            //     fillOpacity: 0.4,
            //     infoWindow: {
            //         content: '<h4>Eiffel Tower</h4><div>Paris, France</div>',
            //         maxWidth: 100
            //     }
            // });
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
            for (var j=0; j < result[unique[u]].length; j++) {
            polygons[u] = new google.maps.Polygon({
                paths: cords[u],
                strokeColor: '#FF0000',
                strokeOpacity: 0.6,
                strokeWeight: 1,
                fillColor: '#FF0000',
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
                infowindow[u].setContent("<h4>" + result[unique[u]][1].perumahan_id +
                    "</h4><div>Paris," +
                    " " +
                    "France</div>");
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

    // Definition of the LatLng coordinates for the polygon's path.
    // var polygonCoords = [{
    //     lat: -16.4836,
    //     lng: 145.4653
    // },
    //     {
    //         lat: -16.4500,
    //         lng: 145.4133
    //     },
    //     {
    //         lat: -16.2319,
    //         lng: 145.4763
    //     },
    //     {
    //         lat: -16.0878,
    //         lng: 145.4548
    //     },
    //     {
    //         lat: -16.0454,
    //         lng: 145.9000
    //     },
    //     {
    //         lat: -16.4861,
    //         lng: 146.1269
    //     },
    //     {
    //         lat: -16.7229,
    //         lng: 145.6500
    //     },
    //     {
    //         lat: -16.5913,
    //         lng: 145.5192
    //     },
    // ];
</script>
<script
    src="
    http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM&callback=initMap">
</script>
