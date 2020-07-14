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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

<body style="background-image: url('assets/images/login/clemens-posch-we1tBosANpU-unsplash.jpg');">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/images/login/chris-king-3oyIKSz_4cE-unsplash.jpg"
                                             class="d-block w-100"
                                             alt="..."
                                             style="height: 600px;">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/login/knoell-marketing-h8c2m599v4U-unsplash.jpg"
                                             class="d-block w-100"
                                             alt="..."
                                             style="height: 600px;">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/login/grant-ritchie-YRF3nhuZ81s-unsplash (1).jpg"
                                             class="d-block w-100"
                                             alt="..."
                                             style="height: 600px;">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h5 class="h5 text-gray-900 mb-4">Sistem Informasi Sarana
                                        Prasarana dan Utilitas Kabupaten Bogor
                                    </h5>
                                    <h1 class="h3 text-gray-900 mb-4">SI - PSU Login</h1>
                                </div>
                                @if (session('alert'))
                                <div class="alert alert-danger mt-5">
                                    {{ session('alert') }}
                                </div>
                                @endif
                                <form method="post" action="/loginpost" class="user">
                                    <meta name="csrf-token" content="{{csrf_token()}}"/>
                                    {{ csrf_field() }}
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
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

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

</body>

</html>
