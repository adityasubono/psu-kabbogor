<!--    Tabel Data Jalan Saluran     -->
<div class="card shadow mt-3">
    <div class="card-header text-white bg-primary">
        Tabel Data Saluran Bersih
    </div>
    <div class="card-body">
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
                    <td>@include('PSU_Perumahan.saluran_bersih.menu_kelola_saluran')</td>
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
    </div>
</div>
