<h5>Data SK Siteplan</h5>
<table class="table table-bordered table-hover display nowrap" cellspacing="0" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>No. SK Siteplan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $data_sk_siteplan as $siteplan )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $siteplan->no_sk_siteplan }}</td>
            <td>{{ $siteplan->tanggal }}</td>
        </tr>

        @empty
        <tr>
            <td colspan="4" class="text-center"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
    </tbody>
</table>