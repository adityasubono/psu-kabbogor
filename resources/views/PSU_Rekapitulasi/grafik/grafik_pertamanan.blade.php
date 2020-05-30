
<div id="jml_hardscape_softscape"></div>

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
