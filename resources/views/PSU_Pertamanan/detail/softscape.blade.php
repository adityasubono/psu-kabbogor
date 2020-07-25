<hr>
<h5>Data Softscape</h5>

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
    @forelse( $data_softscape as $softscape )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $softscape->id }}</td>
        <td>{{ $softscape->nama_alat }}</td>
        <td>{{ $softscape->tipe }}</td>
        <td>{{ $softscape->tahun_perolehan }}</td>
        <td>{{ $softscape->kondisi }}</td>
        <td>{{ $softscape->keterangan }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="8" class="text-center"><b style="color: red">
                Data Tidak Tersedia<b>
        </td>
    </tr>
    @endforelse
    </tbody>
</table>

