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
                <source src="../../assets/video/1/tes1.m3u8" type="application/x-mpegURL">
            </video>
        </div>
    </div>
</div>


<link href="https://vjs.zencdn.net/7.8.2/video-js.css" rel="stylesheet" />
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://vjs.zencdn.net/7.8.2/video.js"></script>
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script>
    var player = videojs('hls-example');
    player.play();
</script>

<div style="height: 200px">

</div>
@endsection
