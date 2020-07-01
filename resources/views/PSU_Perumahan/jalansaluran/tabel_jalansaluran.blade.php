<!--    Tabel Data Jalan Saluran     -->
<div class="card shadow mt-3">
    <div class="card-header text-white bg-primary">
        Tabel Data Jalan dan Saluran
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
                    <th>Nama Jalan dan Saluran</th>
                    <th>Luas Jalan dan Saluran ( m3 )</th>
                    <th>Kondisi Jalan dan Saluran</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_jalan_saluran as $jalansaluran )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>@include('PSU_Perumahan.jalansaluran.menu_kelola_jalansaluran')</td>
                    <td>{{ $jalansaluran->luas_jalan_saluran }} ( m3 )</td>
                    <td>{{ $jalansaluran->kondisi_jalan_saluran }}</td>
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
