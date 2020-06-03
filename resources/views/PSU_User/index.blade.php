@extends('layouts/main')

@section('title', 'Halaman Kelola Data User')

@section('container-fluid')
<div class="container-fluid">
    <link href="{!! asset('assets/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/css/user.css') !!}" rel="stylesheet">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data User</h6>
        </div>
        <div class="card-body">
            <a href="/users/create" class="btn btn-primary btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>

<!--            <a href="/rules" class="btn btn-primary btn-icon-split mb-3">-->
<!--                <span class="icon text-white-50">-->
<!--                    <i class="fas fa-user-tie"></i>-->
<!--                </span>-->
<!--                <span class="text">Tambah Role User</span>-->
<!--            </a>-->

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            @include('PSU_User.tabel_user')
        </div>
    </div>
</div>




<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#confirm-delete').modal({backdrop: 'static', keyboard: false})
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            "scrollX": true
        } );
    } );
</script>
<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>
@endsection
