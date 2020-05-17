@extends('layouts/main')

@section('title', 'Web Rekapitulasi')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Rekapitulasi PSU Perumahan</h6>
        </div>
        <div class="card-body">
            <div id="jml_status"></div>
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
@endsection