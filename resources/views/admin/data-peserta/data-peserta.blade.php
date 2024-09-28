<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
</head>

<body class="bg-class-100">
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
                    <h2 class="text-base font-bold md:text-xl lg:text-2xl mr-6">Data Peserta</h2>

                    <div class="flex flex-row items-center gap-x-2">
                        <!-- Tambah Peserta -->
                        <button onclick="window.location.href='{{ route('tambah-peserta') }}'"
                            class="btn btn-primary font-medium">
                            Tambah Peserta
                        </button>
                        <form action="{{ route('import-csv') }}" method="post" enctype="multipart/form-data"
                            class="flex flex-row items-center">
                            @csrf
                            <input type="file" accept=".csv" name="csv_file"
                                class="file-input file-input-bordered file-input-primary w-full max-w-xs mr-2"
                                required />
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
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
                                    <button
                                        onclick="window.location.href='{{ route('edit-peserta', ['id' => $item->id]) }}'"
                                        class="btn btn-primary font-medium">Edit</button>
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

            <!-- PDF dan Print -->
            <div
                class="w-full flex flex-col justify-center items-center md:flex-row md:justify-end md:items-center gap-2">
                <form action="{{ route('pdf') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-error font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        Export to PDF
                    </button>
                </form>
                <button onclick="window.print()" class="btn btn-primary font-medium"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                    </svg>
                    Print</button>
            </div>
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
</body>

</html>
