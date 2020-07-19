<!--    Tabel Data Jalan Saluran     -->
<h5>Tabel Data Saluran Bersih</h5>
<div class="table-responsive">
    <table class="table table-bordered display nowrap table-hover"
           id="dataTable"
           cellspacing="0"
           style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Nama Saluran Bersih</th>
            <th>Jumlah Saluran Bersih</th>
            <th>Kondisi Saluran Bersih</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $data_saluran_bersih as $saluranbersih )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $saluranbersih->nama_saluran}}</td>
            <td>{{ $saluranbersih->jumlah }} ( m3 )</td>
            <td>{{ $saluranbersih->kondisi }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>
