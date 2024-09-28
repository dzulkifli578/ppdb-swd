<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengumuman</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('peserta.navbar')

    <!-- Header -->
    <header
        class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-6 p-6 gap-y-6 hover:bg-warning ease-in-out duration-300">
        <h1
            class="font-bold text-center text-xl md:text-2xl lg:text-3xl group-hover:text-warning-content ease-in-out duration-300">
            Pengumuman</h1>
        <p
            class="font-normal text-center text-lg md:text-xl lg:text-2xl group-hover:text-warning-content ease-in-out duration-300">
            Informasi dan pengumuman penting bagi peserta PPDB</p>
    </header>

    <!-- Content -->
    <content>
        <div class="flex flex-col gap-y-6 mx-6 my-6 ">
            <!-- Pengumuman -->
            @foreach ($pengumuman as $item)
                <section class="flex justify-center">
                    <div class="bg-base-300 w-full shadow-xl rounded-xl p-6 hover:scale-105 ease-in-out duration-300">
                        <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                            <h1 class="text-xl md:text-2xl lg:text-3xl text-start font-bold">{{ $item->judul }}</h1>
                        </header>
                        <p class="text-base md:text-lg lg:text-xl">{{ $item->isi }}</p>
                        <p class="text-sm md:text-base mt-2">Diumumkan pada: {{ $item->created_at }}</p>
                    </div>
                </section>
            @endforeach
        </div>
    </content>

    <!-- Footer -->
    @include('footer')
</body>

</html>
