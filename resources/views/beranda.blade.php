<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('navbar')

    <!-- Content -->
    <content>
        <!-- Hero -->
        <hero class="hero min-h-screen" style="background-image: url({{ asset('img/school.jpg') }});">
            <div class="hero-overlay bg-opacity-50"></div>
            <div class="hero-content text-base-content text-center">
                <div class="max-w-md hover:scale-105 ease-in-out duration-300">
                    <h1 class="mb-5 text-3xl md:text-4xl lg:text-5xl font-bold">Hello there</h1>
                    <p class="mb-5 text-base md:text-lg lg:text-xl">
                        Bersama Membangun Masa Depan Gemilang di SMK Swadhipa 2 Natar
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </hero>

        <div class="flex flex-col gap-y-6 mx-6 my-6">
            <!-- Tentang Sekolah -->
            <section class="flex justify-center">
                <div
                    class="bg-base-300 w-full shadow-xl rounded-xl p-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">Tentang Sekolah</h1>
                    </header>
                    <p class="text-base">SMK Swadhipa 2 Natar terbentuk pada 9 Juli 2000 di bawah naungan Yayasan
                        Swadaya
                        Himpunan Pemuda
                        (SWADHIPA). Berdirinya SMK Swadhipa 2 Natar diprakarsai oleh Dr. H. Eddy Sutrisno, M.Pd beserta
                        beberapa
                        tokoh Pendiri Yayasan Swadhipa, tokoh masyarakat dan orang tua murid pada waktu itu dengan
                        mendapat
                        restu dari Kepala Daerah di Kabupaten Lampung Selatan. Dengan menyatunya berbagai visi, baiknya
                        jalinan
                        relasi serta koneksi, mendirikan SMK Swadhipa 2 Natar akhirnya terealisasi. Dibangun di tanah
                        wakaf
                        yang
                        pemilik sebelumnya adalah Alm. Ismed Inonu, S.H dan Keluarga Edy Sutrisno, yang menuliskan surat
                        wasiat
                        dengan ringkasan isi suratnya mewasiatkan tanah yang kurang lebih 14898 m2 untuk dibangun panti
                        asuhan,
                        pondok pesantren, dan lembaga sosial lainnya. Sehingga tanah wakaf yang sebelumnya tanah merah
                        dan
                        banyak ilalang ini digunakan untuk membangun pondok pesantren, panti asuhan, serta sekolah.
                        Sekolah
                        yang
                        dibangun di tanah wakaf itu adalah SMK Swadhipa 2 Natar yang kini kita kenal.
                        SMK Swadhipa 2 Natar ketika baru memulai belum memiliki kelas serta fasilitas ruang praktik
                        sehingga
                        kegiatan belajar mengajar angkatan pertama pada tahun 2000 harus menumpang di MTs. Raudlatul
                        Jannah,
                        yaitu sekolah madrasah tsanawiyah yang masih satu yayasan dengan SMK Swadhipa 2, yayasan
                        SWADHIPA.
                    </p>
                </div>
            </section>

            <!-- Tata Cara Pendaftaran -->
            <section class="flex justify-center">
                <div
                    class="bg-base-300 w-full shadow-xl rounded-xl p-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">Tata Cara Pendaftaran</h1>
                    </header>
                    <p class="text-base">Untuk mendaftar di SMK Swadhipa 2 Natar, calon siswa harus mengikuti beberapa
                        langkah
                        sederhana. Pertama, calon siswa dapat mengunjungi situs resmi sekolah atau datang langsung ke
                        sekolah
                        untuk mendapatkan formulir pendaftaran. Setelah mengisi formulir dengan lengkap, calon siswa
                        diharapkan
                        untuk melampirkan dokumen pendukung seperti fotokopi ijazah terakhir, akta kelahiran, dan pas
                        foto
                        terbaru. Setelah semua dokumen disiapkan, formulir pendaftaran beserta dokumen tersebut
                        diserahkan
                        ke
                        bagian pendaftaran sekolah. Calon siswa juga akan mengikuti tes seleksi yang diadakan oleh pihak
                        sekolah
                        untuk menentukan kelayakan dan kesesuaian program keahlian yang dipilih. Informasi lebih lanjut
                        mengenai
                        jadwal pendaftaran dan syarat-syaratnya dapat ditemukan di media sosial atau website resmi SMK
                        Swadhipa
                        2 Natar.</p>
                </div>
            </section>

            <!-- Skill Program -->
            {{-- Kolom 3: Program Keahlian (dengan tautan ke halaman detail). --}}
            <section class="flex justify-center">
                <div
                    class="bg-base-300 w-full shadow-xl rounded-xl p-6 hover:scale-105 ease-in-out duration-300">
                    <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                        <h1 class="text-3xl text-center font-bold">Program Keahlian</h1>
                    </header>
                    <p>SMK Swadhipa 2 Natar menawarkan berbagai program keahlian yang siap mempersiapkan siswa untuk
                        menghadapi
                        tantangan dunia kerja. Terdapat lima jurusan unggulan yang dapat dipilih, yaitu:
                        <br><br>
                    <ul class="list-disc list-inside">
                        <li>Rekayasa Perangkat Lunak (RPL) - Jurusan ini fokus pada pengembangan perangkat lunak dan
                            aplikasi,
                            memberikan keterampilan dalam pemrograman, desain sistem, dan manajemen proyek.</li>
                        <li>Teknik Komputer dan Jaringan (TKJ) - Jurusan ini mempersiapkan siswa untuk memahami dan
                            mengelola
                            infrastruktur jaringan komputer, serta troubleshooting berbagai perangkat keras dan lunak.
                        </li>
                        <li> Teknik Instalasi Tenaga Listrik (TITL) - Program ini mengajarkan siswa mengenai teknologi
                            informasi dan aplikasi praktis di laboratorium, termasuk pengoperasian peralatan
                            laboratorium
                            modern.
                        </li>
                        <li>Teknik Kendaraan Ringan (TKR) - Jurusan ini memberikan pengetahuan tentang perawatan dan
                            perbaikan
                            kendaraan bermotor, mulai dari sistem mesin hingga komponen elektrikal.</li>
                        <li> Teknik Bisnis Sepeda Motor (TBSM) - Fokus pada pemeliharaan dan perbaikan sepeda motor,
                            program
                            ini
                            mengajarkan siswa tentang teknik dan teknologi terbaru di bidang otomotif.
                        </li>
                    </ul>
                    <br>
                    Dengan program-program ini, SMK Swadhipa 2 Natar berkomitmen untuk menghasilkan lulusan yang siap
                    pakai
                    dan memiliki keterampilan yang relevan dengan kebutuhan industri.</p>
                </div>
            </section>
        </div>
    </content>

    <!-- Footer -->
    @include('footer')
</body>

</html>
