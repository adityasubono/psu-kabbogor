@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring CCTV Perumahan</h6>
        </div>
        <div class="card-body">
            <video width="500" height="500" autoplay controls autoplay="true" id="video-webcam">
                <source src="http://192.168.0.17:554" type="video/mp4">
                <object width="320" height="240" type="application/x-shockwave-flash"
                        data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
                    <param name="movie" value="rtsp://releases.flowplayer.org/swf/flowplayer-3.2.5swf"/>
                    <param name="flashvars"
                           value='config={"clip": {"url":"rtsp://admin:aditya123@192.168.0
                                       .17:554/onvif1",
                                       "autoPlay":true,"autoBuffering":true}}'/>
                    <p><a href="http://192.168.0.17:554">view with external
                            app</a></p>
                </object>
            </video>
            <button onclick="takeSnapshot()" class="d-flex">Ambil Gambar</button>
        </div>



        <script type="text/javascript"
                src="../../assets/js/vxgplayer-1.8.31.min.js"></script>
        <link href="../../assets/js/vxgplayer-1.8.31.min.css" rel="stylesheet" />

        <div  class="vxgplayer"
              id="vxg_media_player1"
              width="640"
              height="480"
              url="rtsp://admin:aditya123@192.168.0.17:554/onvif1/defaultPrimary0?streamtype=u"
              nmf-src="/assets/vxgplayer-1.8.31/pnacl/Release/media_player.nmf"
              nmf-path="media_player.nmf"
              useragent-prefix="MMP/3.0"
              latency="10000"
              autohide="2"
              volume="0.7"
              avsync
              autostart
              controls
              mute
              aspect-ratio
              aspect-ratio-mode="1"
              auto-reconnect
              connection-timeout="5000"
              connection-udp="0"
              custom-digital-zoom></div>
    </div>
</div>

<!---->
<!--<script type="text/javascript">-->
<!--    // seleksi elemen video-->
<!--    var video = document.querySelector("#video-webcam");-->
<!---->
<!--    // minta izin user-->
<!--    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;-->
<!---->
<!--    // jika user memberikan izin-->
<!--    if (navigator.getUserMedia) {-->
<!--        // jalankan fungsi handleVideo, dan videoError jika izin ditolak-->
<!--        navigator.getUserMedia({ video: true }, handleVideo, videoError);-->
<!--    }-->
<!---->
<!--    // fungsi ini akan dieksekusi jika  izin telah diberikan-->
<!--    function handleVideo(stream) {-->
<!--        video.srcObject = stream;-->
<!--    }-->
<!---->
<!--    // fungsi ini akan dieksekusi kalau user menolak izin-->
<!--    function videoError(e) {-->
<!--        // do something-->
<!--        alert("Izinkan menggunakan webcam untuk demo!")-->
<!--    }-->
<!---->
<!--    function takeSnapshot() {-->
<!--        // buat elemen img-->
<!--        var img = document.createElement('img');-->
<!--        var context;-->
<!---->
<!--        // ambil ukuran video-->
<!--        var width = video.offsetWidth-->
<!--            , height = video.offsetHeight;-->
<!---->
<!--        // buat elemen canvas-->
<!--        canvas = document.createElement('canvas');-->
<!--        canvas.width = width;-->
<!--        canvas.height = height;-->
<!---->
<!--        // ambil gambar dari video dan masukan-->
<!--        // ke dalam canvas-->
<!--        context = canvas.getContext('2d');-->
<!--        context.drawImage(video, 0, 0, width, height);-->
<!---->
<!--        // render hasil dari canvas ke elemen img-->
<!--        img.src = canvas.toDataURL('image/png');-->
<!--        document.body.appendChild(img);-->
<!--    }-->
<!--</script>-->




@endsection
