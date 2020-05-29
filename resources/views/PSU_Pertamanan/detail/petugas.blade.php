<hr>
<h5>Data Petugas</h5>

<table class="table table-bordered display table-hover nowrap"
       style="width:100%;">
    <thead class="thead-dark">
    <tr>
        <th>No.</th>
        <th>ID Petugas</th>
        <th>Nama Petugas</th>
        <th>Umur</th>
        <th>Pendidikan</th>
        <th>Tugas</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody class="table-bordered bg-light">
    @forelse( $data_petugas as $petugas )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $petugas->id }}</td>
        <td>{{ $petugas->nama }}</td>
        <td>{{ $petugas->umur }}</td>
        <td>{{ $petugas->pendidikan }}</td>
        <td>{{ $petugas->tugas }}</td>
        <td>{{ $petugas->keterangan_tugas }}</td>

    </tr>
    @empty
    <tr class="bg-gray-200">
        <td colspan="8" class="text-center">
            <b style="color: red">Data Tidak Tersedia</b>
        </td>
    </tr>
    @endforelse
    </tbody>
</table>



