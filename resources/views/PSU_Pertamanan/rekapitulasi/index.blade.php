@extends('layouts/main')

@section('title', 'Web Rekapitulasi Pertamanan')

@section('container-fluid')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Grafik Data Pertamanan</h5>
                    <div id="jml_hardscape_softscape"></div>
                    <style type="text/css">
                        #jml_hardscape_softscape {
                            border: 5px solid #6c757d;
                            border-radius: 10px;
                            width: 100%;
                            height: 620px;
                        }
                    </style>
                </div>

                <div class="col-sm-6">
                    <h5>Peta Persebaran Pertamanan</h5>
                    @include('PSU_Pertamanan.rekapitulasi.koordinat.koordinat_pertamanan')
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ url('../assets/js/highchart/code/highcharts.js')}}"></script>
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
            categories: ['Kategori chart berdasarkan jumlah Hardscape dan Softscape yang ada' +
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
@endsection
