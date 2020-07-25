<div id="mymap"></div>


<style type="text/css">
    #mymap {
        border: 3px solid grey;
        width: 100%;
        height: 700px;
    }
</style>

<script type="text/javascript">

    var data_koordinat_sarana = <?php print_r(json_encode($data_koordinat_sarana)) ?>;
    var data_koordinat_sarana_group_by = <?php print_r(json_encode($data_koordinat_sarana_group_by)) ?>;
    var mymap = new GMaps({
        el: '#peta_persebaran_sarana',
        lat: -6.485213,
        lng: 106.753537,
        zoom: 12
    });


    var path = {};
    var latitude;
    var longitude;
    var saranaId = []

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    for (let sarana = 0; sarana < data_koordinat_sarana.length; sarana++) {
        const sarana_id = data_koordinat_sarana[sarana].sarana_id;
        saranaId.push(sarana_id);
    }
    var unique = saranaId.filter(onlyUnique);
    // console.log('unique', unique)

    var result = data_koordinat_sarana.reduce(function (r, a) {
        r[a.sarana_id] = r[a.sarana_id] || [];
        r[a.sarana_id].push(a);
        return r;
    }, Object.create(null));
    console.log('result', result);
    for (let u = 0; u < unique.length; u++) {
        var coord = {};
        path[u] = [];
        for (var j = 0; j < result[unique[u]].length; j++) {
            const lt = parseFloat(result[unique[u]][j].latitude);
            const ltd = parseFloat(result[unique[u]][j].longitude);
            coord[j] = [lt, ltd];
            path[u].push(coord[j]);
        }
    }
    $.each(unique, function (index, value) {
        $.each(path, function (i, v) {
            if(data_koordinat_sarana_group_by[i].kondisi_sarana === 'Baik'){
                mymap.drawPolygon({
                    paths: v,
                    strokeColor: '#a9a9a9',
                    strokeOpacity: 0.5,
                    strokeWeight: 2,
                    fillColor: '#008000',
                    fillOpacity: 0.5,
                    click: function () {
                        $("#review_sarana"+data_koordinat_sarana_group_by[i].sarana_id).modal('show');

                    }
                });
            }else if (data_koordinat_sarana_group_by[i].kondisi_sarana === 'Rusak Ringan'){
                mymap.drawPolygon({
                    paths: v,
                    strokeColor: '#a9a9a9',
                    strokeOpacity: 0.5,
                    strokeWeight: 2,
                    fillColor: '#ffd700',
                    fillOpacity: 0.5,
                    click: function () {
                        $("#review_sarana"+data_koordinat_sarana_group_by[i].sarana_id).modal('show');

                    }
                });
            }else {
                mymap.drawPolygon({
                    paths: v,
                    strokeColor: '#a9a9a9',
                    strokeOpacity: 0.5,
                    strokeWeight: 2,
                    fillColor: '#ff0000',
                    fillOpacity: 0.5,
                    click: function () {
                        $("#review_sarana"+data_koordinat_sarana_group_by[i].sarana_id).modal('show');

                    }
                });
            }

        })
    })

</script>





<script
    src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM&callback=initMap">
</script>
