<div id="jml_status_permukiman"></div>

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
