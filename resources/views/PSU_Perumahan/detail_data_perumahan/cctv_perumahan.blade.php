<h5 class="mt-3">Data CCTV</h5>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama CCTV</th>
        <th scope="col">IP Camera</th>
    </tr>
    </thead>
    <tbody>
    @forelse( $data_cctv as $cctv )
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$cctv->nama_cctv}}</td>
        <td>{{$cctv->ip_cctv}}</td>
    </tr>
    @empty
    <tr>
        <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
            Tersedia</th>
    </tr>
    @endforelse
    </tbody>
</table>
