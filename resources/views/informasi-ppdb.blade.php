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
    <header
        class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-6 p-6 gap-y-6 hover:bg-warning ease-in-out duration-300">
        <h1
            class="font-bold text-center text-2xl md:text-3xl lg:text-4xl group-hover:text-warning-content ease-in-out duration-300">
            Informasi PPDB</h1>
        <p
            class="font-normal text-center text-lg md:text-xl lg:text-2xl group-hover:text-warning-content ease-in-out duration-300">
            Berikut adalah informasi penting terkait PPDB tahun ajaran 2024/2025</p>
    </header>

    <!-- Content -->
    <content>

        <div class="flex flex-col gap-y-6 my-6">
            <!-- Jadwal Pendaftaran -->
            <section class="flex justify-center">
                <div class="bg-base-300 w-full shadow-xl rounded-xl p-6 mx-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">Jadwal Pendaftaran</h1>
                    </header>
                    <ul class="list-disc list-inside text-base space-y-2">
                        <li>Pendaftaran Online: 1 Januari 2024 - 31 Maret 2024</li>
                        <li>Seleksi Berkas: 1 April 2024 - 10 April 2024</li>
                        <li>Pengumuman Hasil Seleksi: 15 April 2024</li>
                        <li>Daftar Ulang: 16 April 2024 - 30 April 2024</li>
                    </ul>
                </div>
            </section>

            <!-- Syarat Pendaftaran -->
            <section class="flex justify-center">
                <div class="bg-base-300 w-full shadow-xl rounded-xl p-6 mx-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">Syarat Pendaftaran</h1>
                    </header>
                    <ul class="list-disc list-inside text-base space-y-2">
                        <li>Fotokopi Ijazah atau Surat Keterangan Lulus (legalisir)</li>
                        <li>Fotokopi Kartu Keluarga (KK)</li>
                        <li>Pas Foto 3x4 (3 lembar)</li>
                        <li>Mengisi formulir pendaftaran online</li>
                    </ul>
                </div>
            </section>

            <!-- Alur Pendaftaran -->
            <section class="flex justify-center">
                <div class="bg-base-300 w-full shadow-xl rounded-xl p-6 mx-6 hover:scale-105 ease-in-out duration-300">
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
                </div>
            </section>

            <!-- Kontak Informasi -->
            <section class="flex justify-center">
                <div class="bg-base-300 w-full shadow-xl rounded-xl p-6 mx-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">Kontak Informasi</h1>
                    </header>
                    <p class="text-base mb-2">
                        Untuk informasi lebih lanjut mengenai pendaftaran, Anda dapat menghubungi kami melalui:
                    </p>
                    <p class="text-base mb-2">
                        <strong>Email:</strong> ppdb@smkswadhipa2natar.sch.id<br>
                        <strong>No. Telp:</strong> (0721) 123-456
                    </p>
                </div>
            </section>

            <!-- FAQ -->
            <section class="flex justify-center">
                <div class="bg-base-300 w-full shadow-xl rounded-xl p-6 mx-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">FAQ (Pertanyaan yang Sering Diajukan)</h1>
                    </header>
                    <div class="flex flex-col justify-center items-center gap-y-3">
                        <div tabindex="0" class="collapse collapse-arrow bg-info">
                            <input type="checkbox" />
                            <div class="collapse-title font-medium text-info-content sm:text-base md:text-lg lg:text-lg ">Kapan batas akhir
                                pendaftaran?
                            </div>
                            <div class="collapse-content">
                                <p class="text-info-content">Batas akhir pendaftaran adalah tanggal 31 Maret 2024.</p>
                            </div>
                        </div>
                        <div tabindex="0" class="collapse collapse-arrow bg-info">
                            <input type="checkbox" />
                            <div class="collapse-title font-medium text-info-content sm:text-base md:text-lg lg:text-lg ">Apa saja dokumen yang
                                harus
                                diunggah
                                saat pendaftaran?
                            </div>
                            <div class="collapse-content">
                                <p class="text-info-content">Hasil seleksi akan diumumkan melalui email dan website
                                    resmi pada
                                    tanggal 15 April 2024.</p>
                            </div>
                        </div>
                        <div tabindex="0" class="collapse collapse-arrow bg-info">
                            <input type="checkbox" />
                            <div class="collapse-title font-medium text-info-content sm:text-base md:text-lg lg:text-lg ">Bagaimana saya tahu jika
                                saya
                                lolos
                                seleksi?</div>
                            <div class="collapse-content">
                                <p class="text-info-content">Hasil seleksi akan diumumkan melalui email dan website
                                    resmi pada
                                    tanggal 15 April 2024.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </content>

    <!-- Footer -->
    @include('footer')
</body>

</html>
