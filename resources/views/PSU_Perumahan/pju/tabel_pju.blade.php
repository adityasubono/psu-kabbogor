<!--    Tabel Data Jalan Saluran     -->
<div class="card shadow mt-3">
    <div class="card-header text-white bg-primary">
        Tabel Data PJU
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
                    <th>Nama PJU</th>
                    <th>Jumlah PJU (unit)</th>
                    <th>Kondisi PJU</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_pju as $pju )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>@include('PSU_Perumahan.pju.menu_kelola_pju')</td>
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
        </div>
    </div>
</div>
