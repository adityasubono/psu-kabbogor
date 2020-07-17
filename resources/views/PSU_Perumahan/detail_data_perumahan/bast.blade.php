<h5>Data BAST </h5>
<table class="table table-bordered table-hover display nowrap" cellspacing="0" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>No. Bast</th>
            <th>No. SPH</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $data_bast as $bast )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $bast->no_bast }}</td>
            <td>{{ $bast->no_sph }}</td>
            <td>{{ $bast->tanggal }}</td>
        </tr>

        @empty
        <tr>
            <td colspan="5" class="text-center">
                <b style="color: red">
                    Data Tidak Tersedia
                    <br>
                </b>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>