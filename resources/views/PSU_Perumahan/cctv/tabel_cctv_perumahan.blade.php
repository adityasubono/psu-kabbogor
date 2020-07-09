<div class="card shadow mt-3">
    <div class="card-header bg-primary text-white">
        Tabel Data CCTV Perumahan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display table-hover nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama CCTV</th>
                    <th>IP CCTV</th>
                    <th>Tampilan CCTV</th>
                </tr>
                </thead>
                <tbody class="bg-light">
                @forelse( $data_cctv_perumahan as $cctv )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>@include('PSU_Perumahan.cctv.menu_kelola_cctv')</td>
                    <td>{{ $cctv->ip_cctv }}</td>
                    <td> <video width="200"
                                height="200"
                                autoplay controls
                                autoplay="true"
                                id="video-webcam">
                            <source src="rtsp://192.168.0.20:554" type="video/mp4">
                            <object width="320" height="240" type="application/x-shockwave-flash"
                                    data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
                                <param name="movie" value="rtsp://releases.flowplayer.org/swf/flowplayer-3.2.5swf"/>
                                <param name="flashvars"
                                       value='config={"clip": {"url":"rtsp://192.168.0.20:554",
                                       "autoPlay":true,"autoBuffering":true}}'/>
                                <p><a href="rtsp://192.168.0.20:554">view with external
                                        app</a></p>
                            </object>
                        </video></td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center"><b style="color: red">
                            Data Tidak Tersedia<b></td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
