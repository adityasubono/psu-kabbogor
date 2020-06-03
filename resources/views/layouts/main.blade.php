@if(Session::get('login') == 'TRUE')
<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('includes.sidebarmenu')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper">


        <!-- Main Content -->

        @include('includes.headermenu')
        <!-- End of Main Content -->


        @yield('container-fluid')


        <div style="height: 240px"></div>


        <!-- Footer -->
        @include('includes.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript-->

<script src="{!! asset('assets/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

<!-- Core plugin JavaScript-->
<script src="{!! asset('assets/jquery-easing/jquery.easing.min.js') !!}"></script>

<!-- Custom scripts for all pages-->
<script src="{!! asset('assets/js/sb-admin-2.min.js') !!}"></script>

<!-- Page level plugins -->
<!--<script src="{!! asset('assets/chart.js/Chart.min.js') !!}"></script>-->

<!-- Page level custom scripts -->
<!--<script src="{!! asset('assets/js/demo/chart-area-demo.js') !!}"></script>-->
<!--<script src="{!! asset('assets/js/demo/chart-pie-demo.js') !!}"></script>-->
<!--<script src="{!! asset('assets/js/demo/chart-bar-demo.js') !!}"></script>-->

<script src="{!! asset('assets/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/datatables/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/js/demo/datatables-demo.js') !!}"></script>


</body>
</html>

@else

    <h1 style="color: red; text-align: center"> Maaf Anda Tidak Mempunyai Hak Akses Disini
        <br> <a href="/">Kembali Ke Halaman Login</a>
        <br>
        <img src="assets/images/403.jpg" style="width: 1000px; height: 500px; margin-top: 30px;">
    </h1>



@endif
