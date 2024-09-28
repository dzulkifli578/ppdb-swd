<section class="flex justify-center">
    <div class="group w-full bg-base-100 shadow-xl rounded-xl p-6 hover:bg-warning ease-in-out duration-300">
        <header class="flex flex-row justify-center items-center my-5 cursor-pointer">
            <h1
            class="text-center text-xl md:text-2xl lg:text-3xl font-bold group-hover:text-warning-content ease-in-out duration-300">
            Perbandingan Peserta Berdasarkan Jenis Kelamin &
                Jurusan</h1>
        </header>
        <div id="genderJurusanTimeChart" class="w-full h-auto"></div>
    </div>
</section>
<script>
    Highcharts.chart('genderJurusanTimeChart', {
        chart: {
            type: 'column',
            backgroundColor: false
        },
        title: false,
        xAxis: {
            categories: ['2021', '2022', '2023']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Pendaftar'
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{
            name: 'Laki-Laki - Teknik Informatika',
            data: [30, 35, 40],
            color: '#3498db'
        }, {
            name: 'Perempuan - Teknik Informatika',
            data: [20, 25, 30],
            color: '#e74c3c'
        }, {
            name: 'Laki-Laki - Sistem Informasi',
            data: [15, 20, 25],
            color: '#2ecc71'
        }, {
            name: 'Perempuan - Sistem Informasi',
            data: [10, 15, 20],
            color: '#9b59b6'
        }],
        credits: false,
    });
</script>
