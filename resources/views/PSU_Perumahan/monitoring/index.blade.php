@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
    <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring CCTV Perumahan</h6>
        </div>
        <div class="card-body">
            <video class="video-js vjs-default-skin" width="400" height="300" controls autoplay="true" id="hls-example">
                <source src="../../assets/video/test.m3u8" type="application/x-mpegURL">
            </video>
            <button onclick="takeSnapshot()" class="d-flex">Ambil Gambar</button>
        </div>
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


<head>
    <link href="https://vjs.zencdn.net/7.8.2/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>

<body>

<script src="https://vjs.zencdn.net/7.8.2/video.js"></script>
</body>


<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script>
    var player = videojs('hls-example');
    player.play();
</script>
@endsection
