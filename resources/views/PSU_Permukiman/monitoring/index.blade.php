@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/perumahan.css') !!}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring CCTV Permukiman</h6>
        </div>
        <div class="card-body">

            <div id="player">
                <video id="video" autoplay="true" controls="controls" width="400" height="400">
                    <source src="http://192.168.0.27:554/live/mystream.m3u8" />
                    Your browser does not support HTML5 streaming!
                </video>
            </div>
        </div>
    </div>
</div>

<script>
    if (Hls.isSupported()) {
        var video = document.getElementById('video');
        var hls = new Hls();
        // bind them together
        hls.attachMedia(video);
        hls.on(Hls.Events.MEDIA_ATTACHED, function () {
            console.log("video and hls.js are now bound together !");
            hls.loadSource("http://192.168.0.27:554/live/mystream.m3u8");
            hls.on(Hls.Events.MANIFEST_PARSED, function (event, data) {
                console.log("manifest loaded, found " + data.levels.length + " quality level");
            });
        });
    }
</script>
<div style="height: 200px">

</div>

@endsection
