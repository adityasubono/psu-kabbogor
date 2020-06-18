<h5 class="mt-3">Data Jalan dan Saluran</h5>

<table class="table table-bordered table-striped">
    <thead class="bg-gray-400">
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Jalan dan Saluran</th>
        <th scope="col">Luas Jalan dan Saluran</th>
        <th scope="col">Kondisi Jalan dan Saluran</th>
    </tr>
    </thead>
    <tbody>
    @forelse( $data_jalan_saluran as $jalan_saluran )
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$jalan_saluran->nama_jalan_saluran}}</td>
        <td>{{$jalan_saluran->luas_jalan_saluran}}</td>
        <td>{{$jalan_saluran->kondisi_jalan_saluran}}</td>
    </tr>
    @empty
    <tr>
        <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
            Tersedia</th>
    </tr>
    @endforelse
    </tbody>
</table>
