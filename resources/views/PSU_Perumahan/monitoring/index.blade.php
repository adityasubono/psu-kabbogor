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

            <video width="400" height="400" autoplay controls>
                <source src="%StreamURL%" type="video/mp4">
                <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
                    <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" />
                    <param name="flashvars" value='config={"clip": {"url": "%StreamURL%", "autoPlay":true, "autoBuffering":true}}' />
                    <p><a href="%StreamURL%">view with external app</a></p>
                </object>
            </video>
        </div>
    </div>
</div>

@endsection
