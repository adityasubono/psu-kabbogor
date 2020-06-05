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

<div class="main">

    <div class="row">
        <div class="col-sm-12">
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
            <form method="post" action="">
                {{ csrf_field() }}

                <div class="form-group">
                    <h3 class="border_h1">Login Sistem</h3>
                    <hr style="background-color: #00b0e8">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik"
                           placeholder="Masukan Nik">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password"
                           placeholder="Masukan Password">
                </div>


                <div id="myProgress">
                    <div id="myBar"></div>
                </div>

                <button onclick="move()" class="btn btn-black mt-3">Login</button>

            </form>

            </div>
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
<script type="text/javascript">
    var nik =document.getElementById('nik')
    var password =document.getElementById('password')
    var i = 0;
    function move() {
        if (i == 0) {
            i = 1;
            var elem = document.getElementById("myBar");
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                    i = 0;
                    window.location.href = "/loginpost";
                    nik = nik.value;
                    password = password.value;
                } else {
                    width++;
                    elem.style.width = width + "%";
                }
            }
        }
    }
</script>
