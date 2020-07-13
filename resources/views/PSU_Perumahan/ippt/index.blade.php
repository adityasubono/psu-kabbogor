<h5>Data IPPT </h5>
<table class="table table-bordered table-hover display nowrap" id="dataTable"
       cellspacing="0"
       style="width:100%">
    <thead class="thead-dark">
    <tr>
        <th>No.</th>
        <th>No. IPPT</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse( $data_ippt as $ippt )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $ippt->no_ippt }}</td>
        <td>{{ $ippt->tanggal }}</td>
        <td>
            <button class="btn btn-warning btn-icon-split"
                    data-toggle="modal"
                    data-target="#confirm-delete{{ $ippt->id }}"
                    data-backdrop="static"
                    data-keyboard="false">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Edit</span>
            </button>

            <button class="btn btn-danger btn-icon-split"
                    data-toggle="modal"
                    data-target="#confirm-delete{{ $ippt->id }}"
                    data-backdrop="static"
                    data-keyboard="false">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Hapus</span>
            </button>
        </td>
    </tr>

    @empty
    <tr>
        <td colspan="4" class="text-center"><b style="color: red">
                Data Tidak Tersedia<b></td>
    </tr>
    @endforelse
    </tbody>
</table>
