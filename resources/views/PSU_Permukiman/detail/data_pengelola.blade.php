<hr>
<h5 class="mt-3">Data Pengelola</h5>

<div class="table-responsive">
    <table class="table table-bordered display table-hover nowrap" id="dataTable"
           cellspacing="0"
           style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>ID Pengelolah</th>
            <th>Nama Pengelolah</th>
            <th>Umur</th>
            <th>Pendidikan</th>
            <th>Tugas</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody class="bg-light">
        @forelse( $data_pengelola as $pengelola )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pengelola->id }}</td>
            <td>{{ $pengelola->nama }}</td>
            <td>{{ $pengelola->umur }}</td>
            <td>{{ $pengelola->pendidikan }}</td>
            <td>{{ $pengelola->tugas }}</td>
            <td>{{ $pengelola->keterangan }}</td>
        </tr>

        @empty
        <tr>
            <td colspan="7" class="text-center"><b style="color: red">
                    Data Tidak Tersedia<b></td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>
