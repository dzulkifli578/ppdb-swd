<section class="flex justify-center">
    <div class="group w-full bg-base-100 shadow-xl rounded-xl p-6 hover:bg-warning ease-in-out duration-300">
        <header class="flex flex-row justify-center items-center my-5 cursor-pointer">
            <h1
                class="text-center text-xl md:text-2xl lg:text-3xl font-bold group-hover:text-warning-content ease-in-out duration-300">
                Perbandingan Peserta Berdasarkan Jurusan</h1>
        </header>
        <div id="jurusanChart" class="w-full h-auto"></div>
    </div>
</section>

<script>
    Highcharts.chart('jurusanChart', {
        chart: {
            type: 'pie',
            backgroundColor: false
        },
        title: false,
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Jurusan',
            colorByPoint: true,
            data: [{
                name: 'Rekayasa Perangkat Lunak',
                y: 30
            }, {
                name: 'Teknik Komputer dan Jaringan',
                y: 25
            }, {
                name: 'Teknik Instalasi Tenaga Listrik',
                y: 15
            }, {
                name: 'Teknik Kendaraan Ringan',
                y: 20
            }, {
                name: 'Teknik dan Bisnis Sepeda Motor',
                y: 10
            }]
        }],
        credits: false,
    });
</script>
