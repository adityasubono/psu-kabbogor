<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Tabel Sarana Perumahan
    </div>
    <div class="card-body" id="data_sarana">
        <div class="table-responsive">
            <table class="table table-bordered table-hover display nowrap" id="dataTable"
                   cellspacing="0"
                   style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Sarana</th>
                    <th>Luas Sarana</th>
                    <th>Kondisi Sarana</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $data_sarana as $sarana )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>@include('PSU_Perumahan.sarana.menu_kelola_sarana')</td>
                    <td>{{ $sarana->luas_sarana }}</td>
                    <td>{{ $sarana->kondisi_sarana }}</td>
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
