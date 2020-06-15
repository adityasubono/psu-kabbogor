@extends('layouts/main')

@section('title', 'Halaman Kelola Data Kecamatan')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/css/user.css') !!}" rel="stylesheet">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Kecamatan</h6>
        </div>
        <div class="card-body">
            <a href="/kecamatans/create" class="btn btn-primary btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                <span class="text">Add Data Kecamatan</span>
            </a>

            <a href="/kelurahans/create" class="btn btn-primary btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                <span class="text">Add Data Kelurahan</span>
            </a>

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable" cellspacing="0"
                       style="width:100%">
                    <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Kecamatan</th>
                        <th>Nama Kelurahan / Desa</th>
                        <th></th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $kecamatans as $kecamatan )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kecamatan->nama_kecamatan }}</td>

                        <td>
                            @foreach( $kecamatan->r_kelurahan as $kel )
                            {{ $kel->nama_kelurahan }}<hr class="m-1">
                            @endforeach
                        </td>
                        <td>
                            @foreach( $kecamatan->r_kelurahan as $kel )
                            <a href="/kelurahans/delete/{{ $kel->id }}"
                               data-toggle="modal"
                               data-target="#delete_kelurahan{{ $kel->id }}"
                               data-backdrop="static"
                               data-keyboard="false">
                                <i class="fas fa-times-circle"></i></a>
                            <hr class="m-1">

                            <!-- Delete Kelurahan -->
                            <div class="modal fade" id="delete_kelurahan{{$kel->id}}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <i class="fas fa-exclamation-triangle fa-2x">
                                                Perhatian !</i>
                                        </div>
                                        <div class="modal-body">
                                            <b>Apakah Anda Akan Menghapus Kelurahan
                                                {{$kel->nama_kelurahan}} ?</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                    data-dismiss="modal">Batal
                                            </button>
                                            <form action="/kelurahans/delete/{{ $kel->id}}"
                                                  method="post"
                                                  class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-ok">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </td>

                        <td>{{ $kecamatan->r_kelurahan->count() }}</td>
                        <td>
                            <a href="/kelurahans/edit/{{ $kecamatan->id }}" class="btn btn-warning
                            btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                                <span class="text">Edit</span>
                            </a>

                            <button class="btn btn-danger btn-icon-split" data-toggle="modal"
                                    data-target="#confirm-delete{{ $kecamatan->id }}" data-backdrop="static"
                                    data-keyboard="false">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                                <span class="text">Hapus</span>
                            </button>


                            <!--Confirm Delete-->
                            <div class="modal fade" id="confirm-delete{{ $kecamatan->id }}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <i class="fas fa-exclamation-triangle fa-2x">
                                                Perhatian !</i>
                                        </div>
                                        <div class="modal-body">
                                            <b>Apakah Anda Akan Menghapus Data Ini Kecamatan
                                                {{$kecamatan->nama_kecamatan}} ?</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                    data-dismiss="modal">Batal
                                            </button>
                                            <form action="/kecamatans/delete/{{ $kecamatan->id }}"
                                                  method="post"
                                                  class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-ok">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#confirm-delete').modal({backdrop: 'static', keyboard: false})
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "scrollX": true
        });
    });
</script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>


@endsection
