<h5>Data PJU </h5>
<table class="table table-bordered display nowrap table-hover" id="dataTable" cellspacing="0" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Nama PJU</th>
            <th>Jumlah PJU (unit)</th>
            <th>Kondisi PJU</th>
        </tr>
    </thead>
    <tbody>
        @forelse( $data_pju as $pju )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pju->nama_pju}}</td>
            <td>{{ $pju->jumlah}}( unit )</td>
            <td>{{ $pju->kondisi }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
    </tbody>
</table>