<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi PPDB</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script src="{{ asset('js/feather.min.js') }}"></script>
</head>

<body>
    <!-- Navbar -->
    @include('admin.components.navbar')

    <!-- Header -->
    @include('admin.components.header')

    <!-- Content -->
    <content>
        <div class="bg-base-300 flex flex-col justify-center rounded-xl shadow-xl m-6 p-6">
            <form action="{{ route('edit-akun', ['id' => $akun->id]) }}" method="post"
                class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-2">
                @csrf
                @method('PUT')
                <!-- Profil Akun -->
                <h2 class="md:col-span-2 font-bold text-2xl md:text-3xl my-2">Profil Akun</h2>

                <!-- Nama Pengguna -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama Pengguna</span>
                    </div>
                    <input type="text" name="nama_pengguna" value="{{ $akun->nama_pengguna }}"
                        placeholder="Masukkan nama pengguna..." class="input input-bordered input-accent" required />
                </label>

                <!-- Kata Sandi -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Kata Sandi</span>
                    </div>
                    <input type="password" name="kata_sandi" placeholder="Kosongkan sandi jika tidak ingin diubah..."
                        class="input input-bordered input-accent" />
                </label>

                <!-- Email -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Email</span>
                    </div>
                    <input type="email" name="email" value="{{ $akun->email }}" placeholder="Masukkan email..."
                        class="input input-bordered input-accent" required />
                </label>

                <!-- Nama Lengkap -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Peran</span>
                    </div>
                    <input type="text" name="peran" value="{{ $akun->peran }}"
                        placeholder="Masukkan nama lengkap..." class="input input-bordered input-accent" readonly />
                </label>

                <!-- Button -->
                <button type="submit" class="btn btn-warning font-bold col-span-1 md:col-span-2 mt-6 w-full">
                    <span data-feather="edit" class="w-auto mr-2"></span>
                    <script>
                        feather.replace();
                    </script>
                    Edit
                </button>
            </form>
        </div>
    </content>

    <!-- Modal -->
    @include('admin.akun.modal', [
        'id' => 'notificationModal',
        'title' => '',
        'message' => ''
    ])

    <!--Footer -->
    @include('footer')
</body>

</html>
