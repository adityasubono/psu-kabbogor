<hr>
<h5>Data Pemeliharaan</h5>

<table class="table table-bordered display table-hover nowrap"
       style="width:100%">
    <thead class="thead-dark">
    <tr>
        <th>No.</th>
        <th>ID</th>
        <th>Nama Alat</th>
        <th>Merk / Tipe</th>
        <th>Tahun Perolehan</th>
        <th>Kondisi</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody class="bg-light">
    @forelse( $data_pemeliharaan as $pemeliharaan )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pemeliharaan->id }}</td>
        <td>{{ $pemeliharaan->nama_alat }}</td>
        <td>{{ $pemeliharaan->tipe }}</td>
        <td>{{ $pemeliharaan->tahun_perolehan }}</td>
        <td>{{ $pemeliharaan->kondisi }}</td>
        <td>{{ $pemeliharaan->keterangan }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="7" class="text-center"><b style="color: red">
                Data Tidak Tersedia<b></td>
    </tr>
    @endforelse
    </tbody>
</table>

