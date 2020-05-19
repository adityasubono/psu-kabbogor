
<div class="container-fluid">
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBMbVQJuBRWDV1jFUVZ9Gzsu-nWOEr9LdM"></script>

    <script>
        var marker;
        var locations = <?php print_r(json_encode($locations)) ?>;
        console.log('lokasi pertamanan',locations);
        // function taruhMarker(peta, posisiTitik){
        //
        //     if( marker ){
        //         // pindahkan marker
        //         marker.setPosition(posisiTitik);
        //     } else {
        //         // buat marker baru
        //         marker = new google.maps.Marker({
        //             position: posisiTitik,
        //             map: peta
        //         });
        //     }
        //     // isi nilai koordinat ke form
        //     document.getElementById("lat").value = posisiTitik.lat();
        //     document.getElementById("lng").value = posisiTitik.lng();

        // }

        function initialize() {
            var propertiPeta = {
                center:new google.maps.LatLng(-6.485219,106.752375),
                zoom:14,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

            google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
            });

            // membuat Marker
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                    map: peta,
                    animation: google.maps.Animation.BOUNCE,
                    icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
                });
            }
        }

        // event jendela di-load
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <div id="googleMap" style="width:100%;height:380px;"></div>

</div>

