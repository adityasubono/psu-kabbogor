@extends('layouts/main')

@section('title', 'Halaman Rekapitulasi')

@section('container-fluid')
<div class="container-fluid">
    <link href="/assets/css/rekapitulasi.css" rel="stylesheet">

    <h4>Halaman Rekapitulasi</h4>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
               href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Bagan
                Data Grafik</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
               href="#nav-profile" role="tab" aria-controls="nav-profile"
               aria-selected="false">Data Peta</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
               href="#nav-contact" role="tab" aria-controls="nav-contact"
               aria-selected="false">Data Tabel</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
             aria-labelledby="nav-home-tab">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PSU Perumahan</h6>
                </div>
                <div class="card-body">
                    <div id="jml_status"></div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PSU Pertamanan</h6>
                </div>
                <div class="card-body">
                    <div id="jml_hardscape_softscape"></div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PSU Kawasan Permukiman</h6>
                </div>
                <div class="card-body">
                    <div id="jml_status_permukiman"></div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kegiatan Fisik</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="psuKegiatanFisik"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
             aria-labelledby="nav-profile-tab">

            <!--Google map-->

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Peta</h6>
                </div>
                <div class="card-body">
                    <div id="map-container-google-2" class="z-depth-1-half map-container-2"
                         style="height:500px">
                        <iframe
                            src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0"
                            style="border:0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>

            <!--Google Maps-->

        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
             aria-labelledby="nav-contact-tab">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tabel</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%"
                               cellspacing="0">
                            <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Seksi</th>
                                <th>Jumlah Aset</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1.</td>
                                <td><a href="/perumahans">PSU Perumahan</a></td>
                                <td>{{$jml_assets_perumahan}}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td><a href="/pertamanans">PSU Pertamanan</a></td>
                                <td>{{$jml_assets_pertamanan}}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td><a href="/permukimans">PSU Kawasan Permukiman</a></td>
                                <td>{{$jml_assets_permukiman}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="{{ url('../assets/js/highchart/code/highcharts.js')}}"></script>
<script type="text/javascript">
    var jml_status_sudah =  <?php echo json_encode($jml_status_sudah) ?>;
    var jml_status_belum =  <?php echo json_encode($jml_status_belum) ?>;
    var jml_status_terlantar =  <?php echo json_encode($jml_status_terlantar) ?>;

    Highcharts.chart('jml_status', {
        chart: {
            type: 'column'
        },
        colors: ['green', 'yellow', 'red'],
        title: {
            text: 'Grafik Status PSU Perumahan Kabupaten Bogor'
        },
        subtitle: {
            text: 'Tahun 2020'
        },
        xAxis: {
            categories: ['Kategori chart batang berdasarkan pada status']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Yang Sudah Serah Terima',
            data: jml_status_sudah,
            backgrounColor: 'red'
        },
            {
                name: 'Jumlah Yang Belum Serah Terima',
                data: jml_status_belum,
            },
            {
                name: 'Jumlah Yang Terlantar',
                data: jml_status_terlantar
            }

        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>

<script type="text/javascript">
    var jml_hardscape =  <?php echo json_encode($jml_hardscape) ?>;
    var jml_softscape =  <?php echo json_encode($jml_softscape) ?>;

    Highcharts.chart('jml_hardscape_softscape', {
        chart: {
            type: 'column'
        },
        colors: ['blue', 'green'],
        title: {
            text: 'Grafik Hardscape dan Softscape PSU Pertamanan Kabupaten Bogor'
        },
        subtitle: {
            text: 'Tahun 2020'
        },
        xAxis: {
            categories: ['Kategori chart batang berdasarkan jumlah Hardscape dan Softscape yang ' +
            'ada' +
            ' diseluruh taman']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Data Hardscape',
            data: jml_hardscape,
            backgrounColor: 'red'
        },
            {
                name: 'Jumlah Data Softscape',
                data: jml_softscape,
            },

        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>

<script type="text/javascript">
    var jml_status_sudah_tpu =  <?php echo json_encode($jml_status_sudah_tpu) ?>;
    var jml_status_belum_tpu =  <?php echo json_encode($jml_status_belum_tpu) ?>;

    Highcharts.chart('jml_status_permukiman', {
        chart: {
            type: 'column'
        },
        colors: ['green', 'yellow'],
        title: {
            text: 'Grafik Status PSU Kawasan Permukiman Kabupaten Bogor'
        },
        subtitle: {
            text: 'Tahun 2020'
        },
        xAxis: {
            categories: ['Kategori chart batang berdasarkan status']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Yang Sudah Serah Terima',
            data: jml_status_sudah_tpu,
            backgrounColor: 'red'
        },
            {
                name: 'Jumlah Yang Belum Serah Terima',
                data: jml_status_belum_tpu,
            },

        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>

@endsection
