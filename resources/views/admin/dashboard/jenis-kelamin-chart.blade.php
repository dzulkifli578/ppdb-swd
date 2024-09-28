<section class="flex justify-center">
    <div class="group w-full bg-base-100 shadow-xl rounded-xl p-6 hover:bg-warning ease-in-out duration-300">
        <header class="flex flex-row justify-center items-center my-5 cursor-pointer">
            <h1
                class="text-center text-xl md:text-2xl lg:text-3xl font-bold group-hover:text-warning-content ease-in-out duration-300">
                Perbandingan Peserta Berdasarkan Jenis Kelamin
            </h1>
        </header>
        <div id="genderChart" class="w-full h-auto"></div>
    </div>
</section>

<script>
    Highcharts.chart('genderChart', {
        chart: {
            type: 'pie',
            backgroundColor: false
        },
        title: false,
        plotOptions: {
            pie: {
                colors: ['#3498db', '#e74c3c'], // Blue for male, pink for female
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Jenis Kelamin',
            colorByPoint: true,
            data: [{
                name: 'Laki-Laki',
                y: 60
            }, {
                name: 'Perempuan',
                y: 40
            }]
        }],
        credits: false,
    });
</script>
