<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SI - PSU ( Login )</title>

    <link href="{!! asset('assets/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <!--    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/sb-admin-2.min.css') !!}">
    <link href="{!! asset('assets/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('assets/jquery/jquery.min.js') !!}"></script>
    <link href="{!! asset('assets/css/login.css') !!}"
          rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('assets/dropzone/min/dropzone.min.css')!!}">
    <script src="{!! asset('assets/dropzone/dropzone.js')!!}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

</head>

<body>
<div class="jumbotron" id="jumbotron_index">
    <div class="card p-3 text-left" id="card_title">
        <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer" id="strip">
                <small class="text-muted">
                   SI - PSU KAB BOGOR
                </small>
            </footer>
           <h1 id="judul">Sistem Informasi Prasarana Sarana dan Utilitas Kabupaten Bogor</h1>

            <p id="tanggal">31 Juli 2020 08:00</p>
        </blockquote>
    </div>

    <div class="card p-3 text-right" id="login_form">
        <form method="post" action="/loginpost" class="user">
            <meta name="csrf-token" content="{{csrf_token()}}"/>
            {{ csrf_field() }}
            <div class="text-center">
                <h1 class="h3 text-gray-900 mb-4">Login</h1>
                @if (session('alert'))
                <div class="alert alert-danger mt-5">
                    {{ session('alert') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text"
                       class="form-control form-control-user"
                       id="exampleInputEmail"
                       name="nik"
                       aria-describedby="emailHelp"
                       placeholder="Enter NIK...">
            </div>
            <div class="form-group">
                <input type="password"
                       class="form-control form-control-user"
                       id="exampleInputPassword"
                       name="password"
                       placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">
                Login
            </button>
        </form>
    </div>
</div>


</body>
</html>


<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

<!-- Bootstrap core JavaScript-->
<script src="{!! asset('assets/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

<!-- Core plugin JavaScript-->
<script src="{!! asset('assets/jquery-easing/jquery.easing.min.js') !!}"></script>

<!-- Custom scripts for all pages-->
<script src="{!! asset('assets/js/sb-admin-2.min.js') !!}"></script>

