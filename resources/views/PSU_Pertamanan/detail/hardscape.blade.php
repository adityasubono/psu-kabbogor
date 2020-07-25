<hr>
<h5>Data Hardscape</h5>

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
    @forelse( $data_hardscape as $hardscape )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $hardscape->id }}</td>
        <td>{{ $hardscape->nama_alat }}</td>
        <td>{{ $hardscape->tipe }}</td>
        <td>{{ $hardscape->tahun_perolehan }}</td>
        <td>{{ $hardscape->kondisi }}</td>
        <td>{{ $hardscape->keterangan }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="8" class="text-center"><b style="color: red">
                Data Tidak Tersedia<b></td>
    </tr>
    @endforelse
    </tbody>
</table>

