<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program Keahlian</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-base-100">

    <!-- Navbar -->
    @include('navbar')

    <!-- Header -->
    <header class="bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-5 p-5">
        <h1 class="text-4xl font-bold">Program Keahlian SMK Swadhipa 2 Natar</h1>
        <p class="text-lg mt-4">Pilih Program Keahlian Terbaik untuk Masa Depan Anda</p>
    </header>

    <!-- Content -->
    <content>
        <!-- Program Keahlian -->
        <section class="container mx-auto p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Rekayasa Perangkat Lunak -->
                <div class="bg-base-300 rounded-xl shadow-xl">
                    <img class="object-cover rounded-t-xl w-full h-48" src="https://via.placeholder.com/720x720"
                        alt="Rekayasa Perangkat Lunak">
                    <div class="flex flex-col justify-start p-6">
                        <h2 class="text-xl font-bold">Rekayasa Perangkat Lunak (RPL)</h2>
                        <p class="text-gray-600 my-4">Belajar tentang cara memanipulasi sistem operasi komputer</p>
                        <a href="#" class=btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>
                <!-- Teknik Komputer dan Jaringan -->
                <div class="bg-base-300 rounded-xl shadow-xl">
                    <img class="object-cover rounded-t-xl w-full h-48" src="https://via.placeholder.com/720x720"
                        alt="Rekayasa Perangkat Lunak">
                    <div class="flex flex-col justify-start p-6">
                        <h2 class="text-xl font-bold">Teknik Komputer dan Jaringan (TKJ)</h2>
                        <p class="text-gray-600 my-4">Belajar tentang cara membuat jaringan internet</p>
                        <a href="#" class=btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>
                <!-- Teknik Instalasi Tenaga Listrik -->
                <div class="bg-base-300 rounded-xl shadow-xl">
                    <img class="object-cover rounded-t-xl w-full h-48" src="https://via.placeholder.com/720x720"
                        alt="Rekayasa Perangkat Lunak">
                    <div class="flex flex-col justify-start p-6">
                        <h2 class="text-xl font-bold">Teknik Instalasi Tenaga Listrik (TITL)</h2>
                        <p class="text-gray-600 my-4">Belajar tentang cara memanipulasi listrik supaya tidak tersetrum
                        </p>
                        <a href="#" class=btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>
                <!-- Teknik Kendaraan Ringan -->
                <div class="bg-base-300 rounded-xl shadow-xl">
                    <img class="object-cover rounded-t-xl w-full h-48" src="https://via.placeholder.com/720x720"
                        alt="Rekayasa Perangkat Lunak">
                    <div class="flex flex-col justify-start p-6">
                        <h2 class="text-xl font-bold">Teknik Kendaraan Ringan (TKR)</h2>
                        <p class="text-gray-600 my-4">Belajar tentang cara bongkar pasang kendaraan ringan</p>
                        <a href="#" class=btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>

                <!-- Teknik dan Bisnis Sepeda Motor -->
                <div class="bg-base-300 rounded-xl shadow-xl">
                    <img class="object-cover rounded-t-xl w-full h-48" src="https://via.placeholder.com/720x720"
                        alt="Rekayasa Perangkat Lunak">
                    <div class="flex flex-col justify-start p-6">
                        <h2 class="text-xl font-bold">Teknik dan Bisnis Sepeda Motor (TBSM)</h2>
                        <p class="text-gray-600 my-4">Belajar tentang cara mengendarai motor ugal-ugalan dengan selamat
                        </p>
                        <a href="#" class=btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>
    </content>
    <!-- Footer -->
    @include('footer')
</body>

</html>
