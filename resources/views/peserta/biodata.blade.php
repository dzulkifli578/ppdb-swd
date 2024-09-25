<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biodata Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('peserta.navbar')

    <!-- Header -->
    <header
        class="group bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-6 p-6 gap-y-6 hover:bg-warning ease-in-out duration-300">
        <h1
            class="font-bold text-center text-2xl md:text-3xl lg:text-4xl group-hover:text-warning-content ease-in-out duration-300">
            Biodata Peserta</h1>
    </header>

    <!-- Content -->
    <content>
        <div class="flex flex-col gap-y-6 my-6 mx-6">
            <form action="{{ route('proses-biodata-peserta', ['id' => $registrasi->id]) }}" method="post"
                class="bg-base-300 rounded-xl shadow-xl p-6">
                @csrf
                <div class="grid grid-cols-2 gap-x-5 gap-y-2">
                    <!-- Bagian 1 -->
                    <h2 class="col-span-2 font-bold text-2xl md:text-3xl my-2">Bagian 1</h2>
                    <!-- Nama Lengkap -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Nama Lengkap</span>
                        </div>
                        <input type="text" name="nama" value="{{ $registrasi->nama }}"
                            placeholder="Masukkan nama lengkap..." class="input input-bordered input-accent" required />
                    </label>
                    <!-- Tempat Lahir -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Tempat Lahir</span>
                        </div>
                        <input type="text" name="tempat_lahir" value="{{ $registrasi->tempat_lahir }}"
                            placeholder="Masukkan tempat lahir..." class="input input-bordered input-accent" required />
                    </label>
                    <!-- Tanggal Lahir -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Tanggal Lahir</span>
                        </div>
                        <input type="date" name="tanggal_lahir" value="{{ $registrasi->tanggal_lahir }}"
                            placeholder="Masukkan tanggal lahir..." class="input input-bordered input-accent"
                            required />
                    </label>
                    <!-- Jenis Kelamin -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Jenis Kelamin</span>
                        </div>
                        <select name="jenis_kelamin" class="select select-bordered select-accent" required>
                            <option disabled selected>Pilih salah satu</option>
                            <option value="Laki-laki"
                                {{ $registrasi->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan"
                                {{ $registrasi->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </label>
                    <!-- Agama -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Agama</span>
                        </div>
                        <select name="agama_id" class="select select-bordered select-accent" required>
                            <option disabled selected>Pilih salah satu</option>
                            @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ $registrasi->agama_id === $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <!-- Alamat -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Alamat</span>
                        </div>
                        <input type="text" name="alamat" value="{{ $registrasi->alamat }}"
                            placeholder="Masukkan alamat..." class="input input-bordered input-accent" required />
                    </label>

                    <!-- Bagian 2 -->
                    <h2 class="col-span-2 font-bold text-2xl md:text-3xl my-2">Bagian 2</h2>
                    <!-- Asal Sekolah -->
                    <label class="form-control w-full col-span-2">
                        <div class="label">
                            <span class="label-text">Asal Sekolah</span>
                        </div>
                        <input type="text" name="asal_sekolah" value="{{ $registrasi->asal_sekolah }}"
                            placeholder="Masukkan asal sekolah..." class="input input-bordered input-accent" required />
                    </label>
                    <!-- Pilihan Jurusan Pertama -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Pilihan Jurusan Pertama</span>
                        </div>
                        <select name="jurusan_pertama_id" class="select select-bordered select-accent" required>
                            <option disabled selected>Pilih salah satu</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}"
                                    {{ $registrasi->jurusan_pertama_id === $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <!-- Pilihan Jurusan Kedua -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Pilihan Jurusan Kedua</span>
                        </div>
                        <select name="jurusan_kedua_id" class="select select-bordered select-accent" required>
                            <option disabled selected>Pilih salah satu</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}"
                                    {{ $registrasi->jurusan_kedua_id === $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>

                    <!-- Bagian 3 -->
                    <h2 class="col-span-2 font-bold text-2xl md:text-3xl my-2">Bagian 3</h2>
                    <!-- Nama Orang Tua / Wali -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Nama Orang Tua / Wali</span>
                        </div>
                        <input type="text" name="nama_ortu" value="{{ $registrasi->nama_ortu }}"
                            placeholder="Masukkan nama orang tua / wali..." class="input input-bordered input-accent"
                            required />
                    </label>
                    <!-- Alamat Orang Tua / Wali -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Alamat Orang Tua / Wali</span>
                        </div>
                        <input type="text" name="alamat_ortu" value="{{ $registrasi->alamat_ortu }}"
                            placeholder="Masukkan alamat orang tua / wali..." class="input input-bordered input-accent"
                            required />
                    </label>
                    <!-- Pekerjaan -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Pekerjaan</span>
                        </div>
                        <input type="text" name="pekerjaan_ortu" value="{{ $registrasi->pekerjaan_ortu }}"
                            placeholder="Masukkan pekerjaan orang tua / wali..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <!-- No. Telepon Siswa -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">No. Telepon Siswa</span>
                        </div>
                        <input type="tel" name="no_telepon" value="{{ $registrasi->no_telepon }}"
                            placeholder="Masukkan no. telepon siswa..." class="input input-bordered input-accent"
                            required />
                    </label>
                    <button type="submit" class="btn btn-primary font-bold col-span-2 mt-6">Edit</button>
                </div>
            </form>
        </div>
    </content>

    <!-- Footer -->
    @include('footer')

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const jurusanPertama = document.querySelector('select[name="jurusan_pertama_id"]').value;
            const jurusanKedua = document.querySelector('select[name="jurusan_kedua_id"]').value;

            if (jurusanPertama === jurusanKedua) {
                event.preventDefault();
                alert('Jurusan pertama dan kedua tidak boleh sama.');
            }
        });
    </script>

</body>

</html>
