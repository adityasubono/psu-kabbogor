<h5>Data IPPT </h5>
<table class="table table-bordered table-hover display nowrap" cellspacing="0" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>No. IPPT</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $data_ippt as $ippt )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ippt->no_ippt }}</td>
            <td>{{ $ippt->tanggal }}</td>
        </tr>

        @empty
        <tr>
            <td colspan="4" class="text-center"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
    </tbody>
</table>