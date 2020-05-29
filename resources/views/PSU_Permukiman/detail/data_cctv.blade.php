
<hr>
<h5 class="mt-3">Data CCTV Permukiman</h5>
<div class="row">
    @forelse( $data_cctv_tpu as $cctv )
    <div class="col-sm-4">
        Nama CCTV : {{ $cctv->nama_cctv }} <br>
        IP CCTV : {{ $cctv->ip_cctv }}<br>
        <video width="300" height="300" autoplay controls>
            <source src="%StreamURL%" type="video/mp4">
            <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
                <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" />
                <param name="flashvars" value='config={"clip": {"url": "%StreamURL%", "autoPlay":true, "autoBuffering":true}}' />
                <p><a href="%StreamURL%">view with external app</a></p>
            </object>
        </video>
    </div>
    @empty
    <div class="col-sm-4">
        <b style="color: red">Data Tidak Tersedia<b>
    </div>
    @endforelse
</div>

