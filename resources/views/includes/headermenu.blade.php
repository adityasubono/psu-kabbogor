<div id="content">
    <link href="{!! asset('assets/css/headermenu.css') !!}" rel="stylesheet">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <img src="{!! asset('assets/images/logo-header-kab-bogor.jpg') !!}" class="lambang_header">

        <h4>Sistem Informasi Prasarana <br>Sarana dan Utilitas Kabupaten Bogor</h4>

        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai,
                        {{Session::get('nama')}}</span>
                    <img class="img-profile rounded-circle" src="{!! asset('assets/images/aditya.jpg') !!}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                    <a class="dropdown-item">
                        <i class="fas fa-id-badge fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{Session::get('nik')}}
                    </a>
                    <a class="dropdown-item">
                        <i class="fas fa-user-tag fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{Session::get('operator')}}
                    </a>
                    <a class="dropdown-item">
                        <i class="fas fa-calendar-day fa-sm fa-fw mr-2 text-gray-400"></i>
                        @php
                        $date = date('Y-m-d H:i:s');
                        echo "$date";

                        @endphp
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/users">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Keluar
                    </a>
                </div>
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-gray-200">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <i class="fas fa-exclamation-triangle fa-2x text-dark">
                                        Perhatian</i>
                                </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Hai, <b style="color: #0E0EFF">{{Session::get('nama')}} </b>Apakah
                                Anda Ingin Keluar ?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button"
                                        data-dismiss="modal">Batal</button>
                                <a class="btn btn-primary" href="/logout/{{Session::get('nama')}}">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">


    </div>
    <!-- /.container-fluid -->
</div>
