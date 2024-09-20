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
    @include("navbar")

    <!-- Content -->
    <content>
        <!-- Hero -->
        <hero class="hero min-h-screen" style="background-image: url({{ asset('img/school.jpg') }});">
            <div class="hero-overlay bg-opacity-50"></div>
            <div class="hero-content text-base-content text-center">
                <div class="max-w-md hover:scale-105 ease-in-out duration-300">
                    <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                    <p class="mb-5">
                        Bersama Membangun Masa Depan Gemilang di SMK Swadhipa 2 Natar
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </hero>

        <!-- About School -->
        <section class="container mx-auto bg-base-300 w-full shadow-xl rounded-xl p-6 my-6 hover:scale-105 ease-in-out duration-300">
            <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                <h1 class="text-3xl text-center font-bold">Tentang Sekolah</h1>
            </header>
            <p>SMK Swadhipa 2 Natar terbentuk pada 9 Juli 2000 di bawah naungan Yayasan Swadaya Himpunan Pemuda
                (SWADHIPA). Berdirinya SMK Swadhipa 2 Natar diprakarsai oleh Dr. H. Eddy Sutrisno, M.Pd beserta beberapa
                tokoh Pendiri Yayasan Swadhipa, tokoh masyarakat dan orang tua murid pada waktu itu dengan mendapat
                restu dari Kepala Daerah di Kabupaten Lampung Selatan. Dengan menyatunya berbagai visi, baiknya jalinan
                relasi serta koneksi, mendirikan SMK Swadhipa 2 Natar akhirnya terealisasi. Dibangun di tanah wakaf yang
                pemilik sebelumnya adalah Alm. Ismed Inonu, S.H dan Keluarga Edy Sutrisno, yang menuliskan surat wasiat
                dengan ringkasan isi suratnya mewasiatkan tanah yang kurang lebih 14898 m2 untuk dibangun panti asuhan,
                pondok pesantren, dan lembaga sosial lainnya. Sehingga tanah wakaf yang sebelumnya tanah merah dan
                banyak ilalang ini digunakan untuk membangun pondok pesantren, panti asuhan, serta sekolah. Sekolah yang
                dibangun di tanah wakaf itu adalah SMK Swadhipa 2 Natar yang kini kita kenal.
                SMK Swadhipa 2 Natar ketika baru memulai belum memiliki kelas serta fasilitas ruang praktik sehingga
                kegiatan belajar mengajar angkatan pertama pada tahun 2000 harus menumpang di MTs. Raudlatul Jannah,
                yaitu sekolah madrasah tsanawiyah yang masih satu yayasan dengan SMK Swadhipa 2, yayasan SWADHIPA.</p>
        </section>

        <!-- Terms and Procedures for Enrollment -->
        <section class="container mx-auto bg-base-300 w-full shadow-xl rounded-xl p-6 my-6 hover:scale-105 ease-in-out duration-300">
            <header class="flex flex-row mx-auto items-center my-5 cursor-pointer">
                <h1 class="text-3xl text-center font-bold">Tata Cara Pendaftaran</h1>
            </header>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae, sit aut.
                Facilis aspernatur labore
                delectus vero, qui modi voluptates, quaerat nostrum dolorem sint minima distinctio, ducimus nemo.
                Dolores laudantium, reprehenderit debitis consequuntur assumenda eos illo, quasi provident sint at
                cumque unde aut similique itaque quis tenetur animi ipsam in. Reprehenderit suscipit vel perferendis
                incidunt ab corrupti in nostrum atque. Laborum dolorem nesciunt totam debitis quasi nisi labore suscipit
                magni fugit minus sint velit harum aliquam sequi, accusantium aperiam incidunt tenetur molestiae autem
                id quis? Iure aut voluptatibus, sequi repellendus odit nesciunt ipsam rerum possimus minus autem
                blanditiis deleniti nulla minima!</p>
        </section>

        <!-- Skill Program -->
        {{-- Kolom 3: Program Keahlian (dengan tautan ke halaman detail). --}}
        <section class="container mx-auto bg-base-300 w-full shadow-xl rounded-xl p-6 my-6 hover:scale-105 ease-in-out duration-300">
            <header class="flex flex-row mx-auto justify-start items-center my-5 cursor-pointer">
                <h1 class="text-3xl text-center font-bold">Program Keahlian</h1>
            </header>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae, sit aut. Facilis aspernatur labore
                delectus vero, qui modi voluptates, quaerat nostrum dolorem sint minima distinctio, ducimus nemo.
                Dolores laudantium, reprehenderit debitis consequuntur assumenda eos illo, quasi provident sint at
                cumque unde aut similique itaque quis tenetur animi ipsam in. Reprehenderit suscipit vel perferendis
                incidunt ab corrupti in nostrum atque. Laborum dolorem nesciunt totam debitis quasi nisi labore suscipit
                magni fugit minus sint velit harum aliquam sequi, accusantium aperiam incidunt tenetur molestiae autem
                id quis? Iure aut voluptatibus, sequi repellendus odit nesciunt ipsam rerum possimus minus autem
                blanditiis deleniti nulla minima!</p>
        </section>
    </content>

    <!-- Footer -->
    @include('footer')
</body>

</html>
