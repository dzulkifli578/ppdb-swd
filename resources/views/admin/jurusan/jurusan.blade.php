<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jurusan</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('admin.components.navbar')

    <!-- Header -->
    @include('admin.components.header')

    <!-- Content -->
    <content>
        <div class="bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-6 p-6 gap-6">
            <div class="flex flex-col w-full overflow-x-auto gap-y-6">
                <!-- Sub Header -->
                <div class="flex flex-row justify-between items-center">
                    <h2 class="text-base font-bold md:text-xl lg:text-2xl mr-6">Daftar Jurusan</h2>
                    <!-- Tambah Jurusan -->
                    @include('admin.jurusan.tambah-jurusan')
                </div>

                <!-- Cari -->
                <label class="input input-bordered flex items-center">
                    <input type="text" id="searchInput" class="grow" placeholder="Cari berdasarkan nama..." />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
            </div>

            <!-- Table Jurusan -->
            <div class="w-full flex overflow-x-auto">
                <table class="table bg-base-100 w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        @foreach ($jurusan as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td><img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}"
                                        class="object-contain rounded-xl w-full h-48"></td>
                                <td class="w-full flex flex-col md:flex-row justify-center items-start gap-2">
                                    @include('admin.jurusan.edit-jurusan')
                                    <form action="{{ route('hapus-jurusan', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error font-medium">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </content>

    <!-- Modal -->
    @include('admin.data-peserta.modal', [
        'id' => 'notificationModal',
        'title' => '',
        'message' => '',
    ])

    <!-- Live Search Feature -->
    <script src="{{ asset('js/pengumuman.js') }}"></script>

    <!-- Footer -->
    @include('footer')
</body>

</html>
