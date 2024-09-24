<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi PPDB</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('peserta.navbar')

    <!-- Content -->
    <content>
        <div class="flex flex-col justify-center h-screen">
            <!-- Status Diterima -->
            @if ($registrasi->status === 'diterima')
                <div class="bg-base-300 flex flex-col items-center rounded-xl shadow-xl mx-6 p-6 gap-y-4">
                    <div class="flex flex-row justify-center items-center gap-x-2">
                        <img src="{{ asset('img/icon/diterima.svg') }}" alt="Tanda Centang" class="object-fit h-12">
                        <p class="text-xl font-bold text-success">Selamat, Anda diterima di {{ $registrasi->jurusan }}!</p>
                    </div>
                    <p>Anda telah diterima di jurusan {{ $registrasi->jurusan }} sebagai pilihan pertama Anda. Informasi lebih
                        lanjut akan dikirimkan melalui email.</p>
                </div>
            @endif

            <!-- Status Ditolak -->
            @if ($registrasi->status === 'ditolak')
                <div class="bg-base-300 flex flex-col items-center rounded-xl shadow-xl mx-6 p-6 gap-y-4">
                    <div class="flex flex-row justify-center items-center gap-x-2">
                        <img src="{{ asset('img/icon/ditolak.svg') }}" alt="Tanda Tolak" class="object-fit h-12">
                        <p class="text-xl font-bold text-error">Maaf, Anda belum diterima di {{ $registrasi->jurusan }}.</p>
                    </div>
                    <p>Anda belum diterima di jurusan {{ $registrasi->jurusan }} pada tahap ini. Jangan khawatir, Anda masih
                        dapat mendaftar ke jurusan lainnya atau menunggu informasi lebih lanjut.</p>
                </div>
            @endif

            <!-- Status Tertunda -->
            @if ($registrasi->status === 'tertunda')
                <div class="bg-base-300 flex flex-col items-center rounded-xl shadow-xl mx-6 p-6 gap-y-4">
                    <div class="flex flex-row justify-center items-center gap-x-2">
                        <img src="{{ asset('img/icon/tertunda.svg') }}" alt="Tanda Tertunda" class="object-fit h-12">
                        <p class="text-xl font-bold text-warning">Pendaftaran Anda masih dalam proses!</p>
                    </div>
                    <p>Status pendaftaran Anda untuk jurusan {{ $registrasi->jurusan }} saat ini masih dalam proses. Mohon
                        menunggu informasi lebih lanjut melalui email atau laman PPDB.</p>
                </div>
            @endif
        </div>
    </content>

    <!-- Footer -->
    @include('footer')
</body>

</html>
