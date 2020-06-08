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
<div id="jam">
    <div id="clock"></div>
</div>


@if(\Session::has('alert'))
<div class="toast" data-delay="5000">
    <div class="toast-header bg-warning text-white">
        <strong class="mr-auto">Peringatan !</strong>
        <small class="text-muted text-white">SI-PSU KAB.BOGOR</small>
    </div>
    <div class="toast-body">
        <h5>{{Session::get('alert')}}</h5>
    </div>
</div>
@endif

@if(\Session::has('alert-success'))
<div class="toast" data-delay="5000">
    <div class="toast-header bg-info text-white">
        <strong class="mr-auto">Informasi</strong>
        <small class="text-muted text-white">SI-PSU KAB.BOGOR</small>
    </div>
    <div class="toast-body">
        <h5>{{Session::get('alert-success')}}</h5>
    </div>
</div>
@endif

<div class="main">
    <div class="login-form">
        <form method="post" action="/loginpost" id="form_login">
            <meta name="csrf-token" content="{{csrf_token()}}"/>
            {{ csrf_field() }}

            <div class="form-group">
                <h3 class="border_h1">Login Sistem</h3>
                <hr style="background-color: #00b0e8">
                <label for="nik">NIK</label>
                <input type="hidden" name="remember_token" value="{{csrf_token()}}">
                <input type="number" class="form-control" id="nik" name="nik"
                       placeholder="Masukan Nik">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password"
                       placeholder="Masukan Password">
            </div>



            <button onclick="move()"
                    class="btn btn-primary mt-3"
                    data-toggle="modal"
                    data-target="#loading"
                    data-backdrop="static"
                    data-keyboard="false">Login</button>

        </form>

    </div>
</div>
<div class="modal fade" id="loading" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white text-bold">
              Loading Data...
            </div>
            <div class="modal-body">
                <div id="myProgress">
                    <div id="myBar" class="text-white text-center"></div>
                </div>
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
    var nik = document.getElementById('nik')
    var password = document.getElementById('password')
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
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/loginpost',
                        method: 'post',
                    });

                } else {
                    width++;
                    elem.style.width = width + "%";
                    elem.innerHTML = width + "%";
                }
            }
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.toast').toast('show');
    });

</script>
<script type="text/javascript">
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
     document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    //-->
</script>

<!-- Menampilkan Hari, Bulan dan Tahun -->

<div id="kalender">
<script type='text/javascript'>
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay(),
        thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;
    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);

</script>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
