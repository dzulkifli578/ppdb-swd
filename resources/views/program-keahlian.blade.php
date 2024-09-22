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
    <header
        class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-6 p-6 gap-y-6 hover:bg-warning ease-in-out duration-300">
        <h1
            class="font-bold text-center text-2xl md:text-3xl lg:text-4xl group-hover:text-warning-content ease-in-out duration-300">
            Program Keahlian</h1>
        <p
            class="font-normal text-center text-lg md:text-xl lg:text-2xl group-hover:text-warning-content ease-in-out duration-300">
            Pilih Program Keahlian Terbaik untuk Masa Depan Anda</p>
    </header>

    <!-- Content -->
    <content>
        <!-- Program Keahlian -->
        <section class="container mx-auto p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Rekayasa Perangkat Lunak -->
                <div
                    class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl hover:bg-neutral ease-in-out duration-300">
                    <img class="object-contain rounded-t-xl w-full h-48" src="{{ asset('img/jurusan/rpl.png') }}"
                        alt="Rekayasa Perangkat Lunak">
                    <div class="flex flex-col w-full justify-start p-6 gap-y-2">
                        <h2 class="text-xl font-bold group-hover:text-neutral-content">Rekayasa Perangkat Lunak (RPL)
                        </h2>
                        <p class="group-hover:text-neutral-content">Belajar tentang cara memanipulasi sistem operasi
                            komputer</p>
                        <a href="#" class="btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>
                <!-- Teknik Komputer dan Jaringan -->
                <div
                    class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl hover:bg-neutral ease-in-out duration-300">
                    <img class="object-contain rounded-t-xl w-full h-48" src="{{ asset('img/jurusan/tkj.png') }}"
                        alt="Teknik Komputer dan Jaringan">
                    <div class="flex flex-col w-full justify-start p-6 gap-y-2">
                        <h2 class="text-xl font-bold group-hover:text-neutral-content">Teknik Komputer dan Jaringan
                            (TKJ)</h2>
                        <p class="group-hover:text-neutral-content">Belajar tentang cara membuat jaringan internet</p>
                        <a href="#" class="btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>
                <!-- Teknik Instalasi Tenaga Listrik -->
                <div
                    class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl hover:bg-neutral ease-in-out duration-300">
                    <img class="object-contain rounded-t-xl w-full h-48" src="{{ asset('img/jurusan/titl.png') }}"
                        alt="Teknik Instalasi Tenaga Listrik">
                    <div class="flex flex-col w-full justify-start p-6 gap-y-2">
                        <h2 class="text-xl font-bold">Teknik Instalasi Tenaga Listrik (TITL)</h2>
                        <p class="group-hover:text-neutral-content">Belajar tentang cara memanipulasi listrik supaya
                            tidak tersetrum
                        </p>
                        <a href="#" class="btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>
                <!-- Teknik Kendaraan Ringan -->
                <div
                    class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl hover:bg-neutral ease-in-out duration-300">
                    <img class="object-contain rounded-t-xl w-full h-48" src="{{ asset('img/jurusan/tkr.png') }}"
                        alt="Teknik Kendaraan Ringan">
                    <div class="flex flex-col w-full justify-start p-6 gap-y-2">
                        <h2 class="text-xl font-bold">Teknik Kendaraan Ringan (TKR)</h2>
                        <p class="group-hover:text-neutral-content">Belajar tentang cara bongkar pasang kendaraan ringan
                        </p>
                        <a href="#" class="btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                </div>

                <!-- Teknik dan Bisnis Sepeda Motor -->
                <div
                    class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl hover:bg-neutral ease-in-out duration-300">
                    <img class="object-contain rounded-t-xl w-full h-48" src="{{ asset('img/jurusan/tbsm.png') }}"
                        alt="Teknik dan Bisnis Sepeda Motor">
                    <div class="flex flex-col w-full justify-start p-6 gap-y-2">
                        <h2 class="text-xl font-bold">Teknik dan Bisnis Sepeda Motor (TBSM)</h2>
                        <p class="group-hover:text-neutral-content">Belajar tentang cara mengendarai motor ugal-ugalan
                            dengan selamat
                        </p>
                        <a href="#" class="btn btn-primary">Lihat
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
