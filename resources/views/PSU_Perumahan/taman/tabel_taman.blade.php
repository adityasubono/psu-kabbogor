<!--    Tabel Data Sarana     -->
<div class="card shadow mb-4">
    <div class="card-header text-white bg-primary">
        Tabel Data Taman dan Penghijauan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display nowrap"
                   id="dataTable"
                   style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Taman</th>
                    <th>Luas Taman</th>
                    <th>Kondisi Taman</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_taman as $taman )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>@include('PSU_Perumahan.taman.menu_kelola_taman')</td>
                    <td>{{ $taman->luas_taman }}</td>
                    <td>{{ $taman->kondisi_taman }}</td>
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
