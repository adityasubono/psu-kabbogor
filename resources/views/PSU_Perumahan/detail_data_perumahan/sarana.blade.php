<h5 class="mt-3">Data Sarana</h5>

<table class="table table-bordered table-striped">
    <thead class="bg-gray-400">
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Sarana</th>
        <th scope="col">Luas Sarana</th>
        <th scope="col">Kondisi Sarana</th>
    </tr>
    </thead>
    <tbody>
    @forelse( $data_sarana as $sarana )
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$sarana->nama_sarana}}</td>
        <td>{{$sarana->luas_sarana}}</td>
        <td>{{$sarana->kondisi_sarana}}</td>
    </tr>
    @empty
    <tr>
        <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
            Tersedia</th>
    </tr>
    @endforelse
    </tbody>
</table>
