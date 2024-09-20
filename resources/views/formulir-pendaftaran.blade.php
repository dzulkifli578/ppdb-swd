<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body>
    <!-- Navbar -->
    @include('navbar')

    <!-- Header -->
    <header class="bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-5 p-5">
        <h1 class="text-4xl font-bold">Formulir Pendaftaran</h1>
    </header>

    <!-- Content -->
    <content>
        <form action="{{ route('proses-formulir-pendaftaran') }}" method="post"
            class="container mx-auto bg-base-300 rounded-xl shadow-xl p-5 mb-5">
            @csrf
            <div class="grid grid-cols-2 gap-x-5">
                <!-- Nama Lengkap -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </div>
                    <input type="text" placeholder="Masukkan nama..." class="input input-bordered input-accent" />
                </label>
                <!-- Email -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input type="email" placeholder="Masukkan email..." class="input input-bordered input-accent" />
                </label>
                <!-- No. HP -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">No. HP</span>
                    </div>
                    <input type="phone" placeholder="Masukkan no. Hp..." class="input input-bordered input-accent" />
                </label>
                <!-- Alamat -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Alamat</span>
                    </div>
                    <input type="text" placeholder="Masukkan alamat" class="input input-bordered input-accent" />
                </label>
                <!-- Program Keahlian -->
                <label class="form-control w-full col-span-2">
                    <div class="label">
                        <span class="label-text">Program Keahlian</span>
                    </div>
                    <select class="select select-bordered select-accent">
                        <option disabled selected>Pilih salah satu</option>
                        <option>Rekayasa Perangkat Lunak</option>
                        <option>Teknik Komputer dan Jaringan</option>
                        <option>Teknik Instalasi Tenaga Listrik</option>
                        <option>Teknik Kendaraan Ringan</option>
                        <option>Teknik dan Bisnis Sepeda Motor</option>
                    </select>
                </label>
                <button type="submit" class="btn btn-primary font-bold col-span-2 mt-6">Submit</button>
            </div>
        </form>
    </content>

    <!-- Footer -->
    @include('footer')

</body>

</html>
