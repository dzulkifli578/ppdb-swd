<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-class-100">
    <!-- Navbar -->
    @include('admin.components.navbar')

    <!-- Header -->
    @include('admin.components.header')

    <!-- Content -->
    <content>
        <div class="flex flex-col gap-y-6 my-6 mx-6">
            <form action="{{ route('proses-tambah-peserta') }}" method="post"
                class="bg-base-300 rounded-xl shadow-xl p-6">
                @csrf
                <div class="grid grid-cols-2 gap-x-5 gap-y-2">
                    <!-- Bagian 0 -->
                    <h2 class="md:col-span-2 font-bold text-xl md:text-2xl lg:text-3xl my-2">Bagian 0</h2>
                    <!-- Akun -->
                    <label class="form-control w-full md:col-span-2">
                        <div class="label">
                            <span class="label-text">Akun</span>
                        </div>
                        <select name="akun_id" class="select select-bordered select-accent" required>
                            <option disabled selected>Pilih salah satu</option>
                            @foreach ($akun as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama_pengguna }}</option>
                            @endforeach
                        </select>
                    </label>

                    <!-- Bagian 1 -->
                    <h2 class="md:col-span-2 font-bold text-xl md:text-2xl lg:text-3xl my-2">Bagian 1</h2>
                    <!-- Nama Lengkap -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Nama Lengkap</span>
                        </div>
                        <input type="text" name="nama" placeholder="Masukkan nama lengkap..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <!-- Tempat Lahir -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Tempat Lahir</span>
                        </div>
                        <input type="text" name="tempat_lahir" placeholder="Masukkan tempat lahir..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <!-- Tanggal Lahir -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Tanggal Lahir</span>
                        </div>
                        <input type="date" name="tanggal_lahir" placeholder="Masukkan tanggal lahir..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <!-- Jenis Kelamin -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Jenis Kelamin</span>
                        </div>
                        <select name="jenis_kelamin" class="select select-bordered select-accent" required>
                            <option disabled selected>Pilih salah satu</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </label>
                    <!-- Agama -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Agama</span>
                        </div>
                        <select name="agama" class="select select-bordered select-accent" required>
                            <option disabled selected>Pilih salah satu</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Khonghucu">Khonghucu</option>
                        </select>
                    </label>
                    <!-- Alamat -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Alamat</span>
                        </div>
                        <input type="text" name="alamat" placeholder="Masukkan alamat..."
                            class="input input-bordered input-accent" required />
                    </label>

                    <!-- Bagian 2 -->
                    <h2 class="md:col-span-2 font-bold text-xl md:text-2xl lg:text-3xl my-2">Bagian 2</h2>
                    <!-- Asal Sekolah -->
                    <label class="form-control w-full col-span-2">
                        <div class="label">
                            <span class="label-text">Asal Sekolah</span>
                        </div>
                        <input type="text" name="asal_sekolah" placeholder="Masukkan asal sekolah..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <!-- Pilihan Jurusan Pertama -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Pilihan Jurusan Pertama</span>
                        </div>
                        <select name="jurusan_pertama_id" class="select select-bordered select-accent" required>
                            <option disabled selected>Pilih salah satu</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>

                    <!-- Bagian 3 -->
                    <h2 class="md:col-span-2 font-bold text-xl md:text-2xl lg:text-3xl my-2">Bagian 3</h2>
                    <!-- Nama Orang Tua / Wali -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Nama Orang Tua / Wali</span>
                        </div>
                        <input type="text" name="nama_ortu" placeholder="Masukkan nama orang tua / wali..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <!-- Alamat Orang Tua / Wali -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Alamat Orang Tua / Wali</span>
                        </div>
                        <input type="text" name="alamat_ortu" placeholder="Masukkan alamat orang tua / wali..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <!-- Pekerjaan -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Pekerjaan</span>
                        </div>
                        <input type="text" name="pekerjaan_ortu"
                            placeholder="Masukkan pekerjaan orang tua / wali..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <!-- No. Telepon Siswa -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">No. Telepon Siswa</span>
                        </div>
                        <input type="tel" name="no_telepon" placeholder="Masukkan no. telepon siswa..."
                            class="input input-bordered input-accent" required />
                    </label>
                    <button type="submit" class="btn btn-primary font-bold col-span-2 mt-6">Submit</button>
                </div>
            </form>
        </div>
    </content>

    <!-- Modal -->
    @include('admin.data-peserta.modal', [
        'id' => 'notificationModal',
        'title' => '',
        'message' => '',
    ])

    <!-- Footer -->
    @include('footer')

    @if (session('validator_fails') || session('success'))
        <dialog class="modal">
            <div class="modal-box">
                @if (session('validator_fails'))
                    <h3 class="text-lg font-bold">Validator Fails</h3>
                    <p class="py-4">{{ session('validator_fails') }}</p>
                @elseif (session('success'))
                    <h3 class="text-lg font-bold">Sukses</h3>
                    <p class="py-4">{{ session('success') }}</p>
                @endif
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    @endif
</body>

</html>
