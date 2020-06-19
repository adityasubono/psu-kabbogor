@if(Session::get('nama_rule') == 'Administrator')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SI PSU</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/beranda">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="/rekapitulasi">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Rekapitulasi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Aplikasi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
           data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PSU Perumahan</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="/perumahans">Kelola Data</a>
                <a class="collapse-item" href="/monitoring/perumahans">Monitoring</a>
                <a class="collapse-item" href="/rekapitulasi/perumahans">Rekapitulasi</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed " href="#" data-toggle="collapse"
           data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PSU Kawasan Permukiman</span>
        </a>
        <div id="collapsePages4" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="/permukimans">Kelola Data</a>
                <a class="collapse-item" href="/monitoring/permukimans">Monitoring</a>
                <a class="collapse-item" href="/rekapitulasi/permukimans">Rekapitulasi</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
           data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PSU Pertamanan</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="/pertamanans">Kelola Data</a>
                <a class="collapse-item" href="/monitoring/pertamanans">Monitoring</a>
                <a class="collapse-item" href="/pertamanans/rekapitulasi/">Rekapitulasi</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
           data-target="#collapsePages5" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kegiatan Fisik</span>
        </a>
        <div id="collapsePages5" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="/kegiatanfisik">Kelola Data</a>
                <a class="collapse-item" href="/kegiatan_fisik/monitoring">Monitoring</a>
                <a class="collapse-item" href="/kegiatan_fisik/rekapitulasi">Rekapitulasi</a>
            </div>
        </div>
    </li>

    <div class="sidebar-heading">
        Pengaturan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
           data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span>
        </a>
        <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Navigasi:</h6>
                <a class="collapse-item" href="/users">Data Pengguna</a>
                <a class="collapse-item" href="/kecamatans">Data Lokasi</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

@endif



<!--menu perumahan-->
@if(Session::get('nama_rule') == 'Operator PSU Perumahan')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SI PSU <br></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Halaman
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
           data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PSU Perumahan</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="/perumahans">Kelola Data</a>
                <a class="collapse-item" href="/monitoring/perumahans">Monitoring</a>
                <a class="collapse-item" href="/rekapitulasi/perumahans">Rekapitulasi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
@endif


<!--menu pertamanan-->
@if(Session::get('nama_rule') == 'Operator PSU Pertamanan')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SI PSU</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Halaman
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
           data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PSU Pertamanan</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="/pertamanans">Kelola Data</a>
                <a class="collapse-item" href="/monitoring/pertamanans">Monitoring</a>
                <a class="collapse-item" href="/pertamanans/rekapitulasi/">Rekapitulasi</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
@endif


<!--menu permukiman-->
@if(Session::get('nama_rule') == 'Operator PSU Kawasan Permukiman')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SI PSU</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Halaman
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
           data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PSU Kawasan Permukiman</span>
        </a>
        <div id="collapsePages4" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="/permukimans">Kelola Data</a>
                <a class="collapse-item" href="/monitoring/permukimans">Monitoring</a>
                <a class="collapse-item" href="/rekapitulasi/permukimans">Rekapitulasi</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
@endif


