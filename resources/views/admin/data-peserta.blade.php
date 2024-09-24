<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-class-100">
    <!-- Navbar -->
    @include('admin.navbar')

    <!-- Header -->
    @include('admin.components.header')

    <!-- Content -->
    <content>
        <div class="bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-6 p-6 gap-6">

            <div class="flex flex-col w-full overflow-x-auto gap-y-6">
                <!-- Sub Header -->
                <div class="flex flex-row justify-between items-center">
                    <h2 class="text-base font-bold md:text-xl lg:text-2xl mr-6">Data Peserta</h2>
                    <!-- Tambah Peserta -->
                    <button onclick="window.location.href='{{ route('tambah-peserta') }}'"
                        class="btn btn-primary font-medium">
                        Tambah Peserta
                    </button>
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

            <!-- Table Data Peserta -->
            <div class="w-full flex overflow-x-auto">
                <table class="table bg-base-100 w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>Pilihan Jurusan Pertama</th>
                            <th>Pilihan Jurusan Kedua</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        @foreach ($registrasi as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->asal_sekolah }}</td>
                                <td>{{ $item->jurusan_pertama_id }}</td>
                                <td>{{ $item->jurusan_kedua_id }}</td>
                                <td class="w-full flex flex-col md:flex-row justify-center items-start gap-2">
                                    <button onclick="window.location.href='{{ route('edit-peserta', ['id' => $item->id]) }}'" class="btn btn-primary font-medium">Edit</button>
                                    <form action="{{ route('hapus-pengumuman', ['id' => $item->id]) }}" method="post">
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

    <!-- Footer -->
    @include('footer')

    <!-- Live Search Feature -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const dataTable = document.getElementById('dataTable');
            const rows = dataTable.getElementsByTagName('tr');

            searchInput.addEventListener('input', function() {
                const query = searchInput.value.toLowerCase();

                Array.from(rows).forEach(row => {
                    const cells = row.getElementsByTagName('td');
                    if (cells.length > 0) {
                        const nameCell = cells[1]; // Assuming the 'Nama' column is the second one
                        const nameText = nameCell.textContent.toLowerCase();

                        if (nameText.includes(query)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            });
        });
    </script>

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
