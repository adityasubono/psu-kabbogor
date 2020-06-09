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

            <video width="500" height="500" autoplay controls  autoplay="true" id="video-webcam"">
                <source src="rtsp://admin:aditya123@192.168.0.21:554/onvif1" type="video/mp4">
                <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
                    <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" />
                    <param name="flashvars" value='config={"clip": {"url": "rtsp://admin:aditya123@192.168.0.21:554/onvif1", "autoPlay":true, "autoBuffering":true}}' />
                    <p><a href="rtsp://admin:aditya123@192.168.0.21:554/onvif1">view with external app</a></p>
                </object>
            </video>
            <button onclick="takeSnapshot()" class="d-flex">Ambil Gambar</button>


            <OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
                    codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
                    width="640" height="480" id="vlc" events="True">
                <param name="Src" value="rtsp://admin:aditya123@192.168.0.17:554/onvif1" />
                <param name="ShowDisplay" value="True" />
                <param name="AutoLoop" value="False" />
                <param name="AutoPlay" value="True" />
                <embed id="vlcEmb" type="application/x-google-vlc-plugin"
                       version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640"
                       height="480"
                       target="rtsp://cameraipaddress"/>
            </OBJECT>
            <embed type="application/x-vlc-plugin" pluginspage="http://www.videolan.org" autoplay="yes" loop="no" width="300" height="200" target="rtsp://admin:aditya123@192.168.0.21:554/onvif1" />
        </div>
        <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
        <video id="video" autoplay="true" controls="controls"></video>
        <script>
            if (Hls.isSupported()) {
                var video = document.getElementById('video');
                var hls = new Hls();
                // bind them together
                hls.attachMedia(video);
                hls.on(Hls.Events.MEDIA_ATTACHED, function () {
                    console.log("video and hls.js are now bound together !");
                    hls.loadSource("http://192.168.0.17/live/mystream.m3u8");
                    hls.on(Hls.Events.MANIFEST_PARSED, function (event, data) {
                        console.log("manifest loaded, found " + data.levels.length + " quality level");
                    });
                });
            }
        </script>
    </div>
</div>


<script type="text/javascript">
    // seleksi elemen video
    var video = document.querySelector("#video-webcam");

    // minta izin user
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    // jika user memberikan izin
    if (navigator.getUserMedia) {
        // jalankan fungsi handleVideo, dan videoError jika izin ditolak
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

    // fungsi ini akan dieksekusi jika  izin telah diberikan
    function handleVideo(stream) {
        video.srcObject = stream;
    }

    // fungsi ini akan dieksekusi kalau user menolak izin
    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk demo!")
    }

    function takeSnapshot() {
        // buat elemen img
        var img = document.createElement('img');
        var context;

        // ambil ukuran video
        var width = video.offsetWidth
            , height = video.offsetHeight;

        // buat elemen canvas
        canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;

        // ambil gambar dari video dan masukan
        // ke dalam canvas
        context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, width, height);

        // render hasil dari canvas ke elemen img
        img.src = canvas.toDataURL('image/png');
        document.body.appendChild(img);
    }
</script>

@endsection
