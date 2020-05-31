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
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai, Aditya
                        Nugroho Subono</span>
                    <img class="img-profile rounded-circle" src="{!! asset('assets/images/aditya.jpg') !!}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

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
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Apakah Anda Akan Keluar Dari Sistem Ini ?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button"
                                        data-dismiss="modal">Batal</button>
                                <a class="btn btn-primary" href="/logout">Keluar</a>
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
