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
                @foreach ($jurusan as $item)
                    <div
                        class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl hover:bg-neutral ease-in-out duration-300">
                        <img class="object-contain rounded-t-xl w-full h-48" src="{{ asset($item->gambar) }}"
                            alt="{{ $item->nama }}">
                        <div class="flex flex-col w-full justify-start p-6 gap-y-2">
                            <h2 class="text-xl font-bold group-hover:text-neutral-content">{{ $item->nama }}
                            </h2>
                            <p class="group-hover:text-neutral-content">{{ $item->deskripsi }}</p>
                            <a href="#" class="btn btn-primary">Lihat
                                Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </content>
    <!-- Footer -->
    @include('footer')
</body>

</html>
