<h5>Data Izin Lokasi </h5>
<table class="table table-bordered table-hover display nowrap" cellspacing="0" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>No. Izin Lokasi</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $data_izin_lokasi as $izin )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $izin->no_izin }}</td>
            <td>{{ $izin->tanggal }}</td>
        </tr>

        @empty
        <tr>
            <td colspan="4" class="text-center"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
    </tbody>
</table>