@extends('layouts/main')

@section('title', 'Web Rekapitulasi Kawasan Permukiman')

@section('container-fluid')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Grafik Kawasan Permukiman</h4>
                    <div id="jml_status"></div>
                    <style type="text/css">
                        #jml_status {
                            border: 5px solid #6c757d;
                            border-radius: 10px;
                            width: 100%;
                            height: 620px;
                        }
                    </style>
                </div>
                <div class="col-sm-6">
                    <h4>Peta Persebaran Kawasan Permukiman</h4>
                    @include('PSU_Permukiman.rekapitulasi.koordinat.koordinat_permukiman')
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ url('../assets/js/highchart/code/highcharts.js')}}"></script>
<script type="text/javascript">
    var jml_status_sudah =  <?php echo json_encode($jml_status_sudah) ?>;
    var jml_status_belum =  <?php echo json_encode($jml_status_belum) ?>;

    Highcharts.chart('jml_status', {
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
            categories: ['Kategori chart berdasarkan status']
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
            name: 'Jumlah Status Sudah Beroperasional',
            data: jml_status_sudah,
            backgrounColor: 'red'
        },
            {
                name: 'Jumlah Satus Belum Beroperasional',
                data: jml_status_belum,
            },

        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500,
                    maxHeight: 500,
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
