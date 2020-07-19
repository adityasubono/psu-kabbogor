<h5>Data BASTA </h5>
<table class="table table-bordered table-hover display nowrap" cellspacing="0" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>No. Basta</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $data_basta as $basta )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $basta->no_basta }}</td>
            <td>{{ $basta->tanggal }}</td>
        </tr>

        @empty
        <tr>
            <td colspan="4" class="text-center"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
    </tbody>
</table>