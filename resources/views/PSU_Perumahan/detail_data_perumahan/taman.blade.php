<h5 class="mt-3">Data Taman dan Penghijauan</h5>

<table class="table table-bordered table-striped">
    <thead class="bg-gray-400">
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Taman</th>
        <th scope="col">Luas Taman</th>
        <th scope="col">Kondisi Taman</th>
    </tr>
    </thead>
    <tbody>
    @forelse( $data_taman as $taman )
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$taman->nama_taman}}</td>
        <td>{{$taman->luas_taman}}</td>
        <td>{{$taman->kondisi_taman}}</td>
    </tr>
    @empty
    <tr>
        <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
            Tersedia</th>
    </tr>
    @endforelse
    </tbody>
</table>
