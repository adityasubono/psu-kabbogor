@extends('layouts/main')

@section('title', 'Web Rekapitulasi')

@section('container-fluid')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Rekapitulasi PSU Pertamanan</h6>
        </div>
        <div class="card-body">
            <div id="jml_hardscape_softscape"></div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gray-500">
            <h6 class="m-0 font-weight-bold text-primary">Peta Persebaran PSU Pertamanan</h6>
        </div>
        <div class="card-body">
            @include('PSU_Pertamanan.rekapitulasi.koordinat.koordinat_pertamanan')
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
