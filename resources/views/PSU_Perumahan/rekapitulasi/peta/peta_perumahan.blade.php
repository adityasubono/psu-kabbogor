<div id="mymap"></div>
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
    var locations = <?php print_r(json_encode($koordinat_perumahan)) ?>;
    var polygon;
    var cords = [];
    const perumahan_id = [];
    var mymap = new GMaps({
        el: '#mymap',
        lat: -6.485213,
        lng: 106.753537,
        zoom: 12
    });
    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }
    var path = [
        [-6.483172240800637,106.72708355538268],
        [-6.474511539654921,106.764778807396],
        [-6.499003180591519,106.76250773680306],
        [-6.494429313506979,106.73000179879088]
    ];
    for(let perumahan=0; perumahan< locations.length;perumahan++){
        const perumahanId = locations[perumahan].perumahan_id;
        perumahan_id.push(perumahanId);
    }
    var unique = perumahan_id.filter( onlyUnique );
    console.log('unique',unique);
    var result = locations.reduce(function (r, a) {
        r[a.perumahan_id] = r[a.perumahan_id] || [];
        r[a.perumahan_id].push(a);
        return r;
    }, Object.create(null));

    console.log('result',result);
    for(let u=0;u< unique.length; u++){
        // cords.push([u]);
        for (var j=0; j < result[unique[u]].length; j++) {
            const lt = parseFloat(result[unique[u]][j].latitude);
            const ltd = parseFloat(result[unique[u]][j].longitude);


            const coord = [lt,ltd];
            // var lng = str[k].split(",");
            cords.push(coord);

            // polygon = new google.maps.Polygon({
            //     paths: pathss,
            //     strokeColor: 'red',
            //     strokeOpacity: 0,
            //     strokeWeight: 1,
            //     fillColor: 'red',
            //     fillOpacity: 0.5
            // });







            // $.each(locations, function (index, value) {
            //     mymap.addMarker({
            //         lat: value.latitude,
            //         lng: value.longitude,
            //         title: value.id,
            //         infoWindow: {
            //             content: '<div id="content">' +
            //                 '<div id="siteNotice">' +
            //                 '</div>' +
            //                 '<h5 id="firstHeading" class="firstHeading">Perumahan Bumi Citra Asri</h5>'
            //                 +
            //                 '<div id="bodyContent">' +
            //                 '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            //                 'sandstone rock formation in the southern part of the ' +
            //                 'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '
            //                 +
            //                 'south west of the nearest large town, Alice Springs; 450&#160;km ' +
            //                 '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major ' +
            //                 'features of the Uluru - Kata Tjuta National Park. Uluru is ' +
            //                 'sacred to the Pitjantjatjara and Yankunytjatjara, the ' +
            //                 'Aboriginal people of the area. It has many springs, waterholes, ' +
            //                 'rock caves and ancient paintings. Uluru is listed as a World ' +
            //                 'Heritage Site.</p>' +
            //                 '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'
            //                 +
            //                 'https://en.wikipedia.org/w/index.php?title=Uluru</a> ' +
            //                 '(last visited June 22, 2009).</p>' +
            //                 '</div>' +
            //                 '</div>',
            //             maxWidth: 700
            //         }
            //     });
            // });
        }

        polygons = mymap.drawPolygon({
            paths: cords,
            strokeColor: '#000000',
            strokeOpacity: 0.3,
            strokeWeight: 2,
            fillColor: '#00e676',
            fillOpacity: 0.4
        });
    }

    console.log('u',cords);
    console.log('perumahan_id', perumahan_id);
    console.log('cords', cords);
    console.log('unique',unique);



</script>
