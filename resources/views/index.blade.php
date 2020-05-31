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
    <div class="login-main-text text-dark text-bold">
        <h2>Sistem Informasi Prasana Sarana dan Utilitas <br>Kabupaten Bogor</h2>
    </div>
</div>
<div class="main">

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

    <div class="col-md-6 col-sm-12">
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
                <div class="form-group">
                    <label for="operator">Sebagai Pengguna :</label>
                    <select class="custom-select @error('operator') is-invalid @enderror"
                            id="operator" name="operator">
                        <option value="">--Pilih Operator--</option>
                        <option value="PSU-Admin">Admin</option>
                        <option value="PSU-Perumahan">Operator PSU Perumahan</option>
                        <option value="PSU-Pertamanan">Operator PSU Pertamanan</option>
                        <option value="PSU-Permukiman">Operator PSU Kawasan Permukiman</option>
                    </select>
                    @error('operator')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-black">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
