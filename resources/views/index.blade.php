<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{!! asset('assets/jquery/jquery.min.js') !!}"></script>
    <link href="{!! asset('assets/css/login.css') !!}" rel="stylesheet" type="text/css">
    <!------ Include the above in your HEAD tag ---------->
</head>
<body id="LoginForm">
<div class="sidenav">
    <div class="login-main-text text-dark text-bold ">
        <h1 class="border_h1">Login Sistem</h1>
    </div>
</div>
<div class="main">
    <h2>Sistem Informasi Prasana Sarana dan Utilitas <br>Kabupaten Bogor</h2>
    <div class="col-md-6 col-sm-12">
        @if(\Session::has('alert'))
        <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
        </div>
        @endif

        @if(\Session::has('alert-success'))
        <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
        </div>
        @endif
        <div class="login-form">
            <form method="post" action="/loginpost">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik"
                           placeholder="Masukan Nik">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  id="password" class="form-control" name="password"
                           placeholder="Masukan Password">
                </div>

                <button type="submit" class="btn btn-black">Login</button>
            </form>
        </div>
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
