<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi PPDB</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body>
    <!-- Navbar -->
    @include('navbar')

    <header
        class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-6 p-6 gap-y-6 hover:bg-warning ease-in-out duration-300">
        <h1
            class="font-bold text-center text-2xl md:text-3xl lg:text-4xl group-hover:text-warning-content ease-in-out duration-300">
            Kontak Kami</h1>
        <p
            class="font-normal text-center text-lg md:text-xl lg:text-2xl group-hover:text-warning-content ease-in-out duration-300">
            Anda dapat menghubungi kami melalui informasi berikut</p>
    </header>

    <!-- Content -->
    <content>
        <div class="flex flex-col gap-y-6 mx-6 my-6 ">
            <!-- Informasi Kontak -->
            <section class="flex justify-center">
                <div class="bg-base-300 w-full shadow-xl rounded-xl p-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">Informasi Kontak</h1>
                    </header>
                    <div class="text-base">
                        <p>Alamat: Jl. Swadhipa No.217, Bumisari, Kec. Natar, Kabupaten Lampung Selatan, Lampung</p>
                        <p>Kode Pos: 35362</p>
                        <p>Telepon: (0721) 7600079</p>
                        <p>Email: smkswadhipa2@gmail.com</p>
                        <p>Jam Operasional: Senin - Jumat, 07:00 - 16:00</p>
                    </div>
                </div>
            </section>

            <!-- Ikuti Kami di Media Sosial -->
            <section class="flex justify-center">
                <div class="bg-base-300 w-full shadow-xl rounded-xl p-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">Ikuti Kami di Media Sosial</h1>
                    </header>
                    <div class="text-base">
                        <ul class="mt-2 space-y-2">
                            <li>
                                <a href="#" class="text-blue-500 hover:underline">Facebook</a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-500 hover:underline">Instagram</a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-500 hover:underline">Twitter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </content>

    <!-- Footer -->
    @include('footer')
</body>

</html>
