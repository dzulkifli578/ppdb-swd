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
    @include('navbar')

    <!-- Header -->
    <header class="bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-5 p-5">
        <h1 class="text-4xl font-bold">Informasi PPDB</h1>
        <p class="text-lg mt-4">Selamat datang di halaman Penerimaan Peserta Didik Baru (PPDB) SMK Swadhipa 2 Natar.
            Berikut adalah informasi penting terkait PPDB tahun ajaran 2024/2025.</p>
    </header>

    <!-- Content -->
    <content>
        <!-- Jadwal Pendaftaran -->
        <section
            class="container mx-auto bg-base-300 w-full shadow-xl rounded-xl p-6 my-6 hover:scale-105 ease-in-out duration-300">
            <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                <h1 class="text-3xl text-center font-bold">Jadwal Pendaftaran</h1>
            </header>
            <ul class="list-disc list-inside text-base space-y-2">
                <li>Pendaftaran Online: 1 Januari 2024 - 31 Maret 2024</li>
                <li>Seleksi Berkas: 1 April 2024 - 10 April 2024</li>
                <li>Pengumuman Hasil Seleksi: 15 April 2024</li>
                <li>Daftar Ulang: 16 April 2024 - 30 April 2024</li>
            </ul>
        </section>
        <!-- Syarat Pendaftaran -->
        <section
            class="container mx-auto bg-base-300 w-full shadow-xl rounded-xl p-6 my-6 hover:scale-105 ease-in-out duration-300">
            <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                <h1 class="text-3xl text-center font-bold">Syarat Pendaftaran</h1>
            </header>
            <ul class="list-disc list-inside text-base space-y-2">
                <li>Fotokopi Ijazah atau Surat Keterangan Lulus (legalisir)</li>
                <li>Fotokopi Kartu Keluarga (KK)</li>
                <li>Pas Foto 3x4 (3 lembar)</li>
                <li>Mengisi formulir pendaftaran online</li>
            </ul>
        </section>
        <!-- Alur Pendaftaran -->
        <section
            class="container mx-auto bg-base-300 w-full shadow-xl rounded-xl p-6 my-6 hover:scale-105 ease-in-out duration-300">
            <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                <h1 class="text-3xl text-center font-bold">Alur Pendaftaran</h1>
            </header>
            <ol class="list-decimal list-inside text-base space-y-2">
                <li>Calon peserta didik mengisi formulir pendaftaran online melalui website resmi SMK
                    Swadhipa 2 Natar.</li>
                <li>Unggah dokumen persyaratan yang diminta.</li>
                <li>Menunggu proses seleksi berkas oleh panitia.</li>
                <li>Pengumuman hasil seleksi akan diinformasikan melalui email dan website.</li>
                <li>Jika lolos seleksi, calon peserta didik wajib melakukan daftar ulang dengan menyerahkan
                    berkas asli.</li>
            </ol>
        </section>
        <!-- Kontak Informasi -->
        <section
            class="container mx-auto bg-base-300 w-full shadow-xl rounded-xl p-6 my-6 hover:scale-105 ease-in-out duration-300">
            <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                <h1 class="text-3xl text-center font-bold">Kontak Informasi</h1>
            </header>
            <p class="text-base mb-2">
                Untuk informasi lebih lanjut mengenai pendaftaran, Anda dapat menghubungi kami melalui:
            </p>
            <p class="text-base">
                <strong>Email:</strong> ppdb@smkswadhipa2natar.sch.id<br>
                <strong>No. Telp:</strong> (0721) 123-456
            </p>
        </section>
        <!-- FAQ -->
        <section
            class="container mx-auto bg-base-300 w-full shadow-xl rounded-xl p-6 my-6 hover:scale-105 ease-in-out duration-300">
            <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                <h1 class="text-3xl text-center font-bold">FAQ (Pertanyaan yang Sering Diajukan)</h1>
            </header>
            <div tabindex="0" class="collapse collapse-arrow bg-info">
                <input type="checkbox" />
                <div class="collapse-title text-info-content text-xl font-medium">Kapan batas akhir pendaftaran?</div>
                <div class="collapse-content">
                    <p class="text-info-content">Batas akhir pendaftaran adalah tanggal 31 Maret 2024.</p>
                </div>
            </div>
            <div tabindex="0" class="collapse collapse-arrow bg-info my-3">
                <input type="checkbox" />
                <div class="collapse-title text-info-content text-xl font-medium">Apa saja dokumen yang harus diunggah saat pendaftaran?
                </div>
                <div class="collapse-content">
                    <p class="text-info-content">Hasil seleksi akan diumumkan melalui email dan website resmi pada tanggal 15 April 2024.</p>
                </div>
            </div>
            <div tabindex="0" class="collapse collapse-arrow bg-info">
                <input type="checkbox" />
                <div class="collapse-title text-info-content text-xl font-medium">Bagaimana saya tahu jika saya lolos seleksi?</div>
                <div class="collapse-content">
                    <p class="text-info-content">Hasil seleksi akan diumumkan melalui email dan website resmi pada tanggal 15 April 2024.</p>
                </div>
            </div>
        </section>
    </content>

    <!-- Footer -->
    @include('footer')
</body>

</html>
