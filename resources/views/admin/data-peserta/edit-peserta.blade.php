<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peserta</title>
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
            <form action="{{ route('proses-edit-peserta', ['id' => $registrasi->id]) }}" method="post"
                class="bg-base-300 rounded-xl shadow-xl p-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-2">
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
                                <option value="{{ $item->id }}"
                                    {{ $registrasi->akun_id === $item->id ? 'selected' : '' }}>
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
                        <select name="jenis_kelamin" value="{{ $registrasi->jenis_kelamin }}"
                            class="select select-bordered select-accent" required>
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
                                <option value="{{ $item->id }}"
                                    {{ $registrasi->agama_id === $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                </option>
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
                    <h2 class="md:col-span-2 font-bold text-xl md:text-2xl lg:text-3xl my-2">Bagian 2</h2>
                    <!-- Asal Sekolah -->
                    <label class="form-control w-full md:col-span-2">
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
                    <h2 class="md:col-span-2 font-bold text-xl md:text-2xl lg:text-3xl my-2">Bagian 3</h2>
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
                            placeholder="Masukkan alamat orang tua / wali..."
                            class="input input-bordered input-accent" required />
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
                    <button type="submit" class="btn btn-primary font-bold md:col-span-2 mt-6">Submit</button>
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
</body>

</html>
