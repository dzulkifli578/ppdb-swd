<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/highcharts.js ') }}"></script>
</head>

<body class="bg-class-100">
    <!-- Navbar -->
    @include('admin.components.navbar')

    <!-- Header -->
    @include('admin.components.header')

    <!-- Content -->
    <content>
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 justify-center items-center text-nowrap mx-6 my-6 gap-4">
            <!-- Jumlah Akun Admin -->
            <section class="flex justify-center">
                <div
                    class="overflow-x-auto group w-full bg-base-300 shadow-xl rounded-xl p-6 hover:bg-warning ease-in-out duration-300">
                    <div class="flex flex-row justify-center items-center cursor-pointer gap-x-4">
                        <span data-feather="user"
                            class="w-auto h-12 group-hover:text-warning-content ease-in-out duration-300"></span>
                        <script>
                            feather.replace()
                        </script>
                        <div class="w-full flex flex-col items-start gap-y-2">
                            <h1
                                class="text-base md:text-lg lg:text-lg font-bold group-hover:text-warning-content ease-in-out duration-300">
                                Jumlah Akun Admin</h1>
                            <p class="font-semibold group-hover:text-warning-content ease-in-out duration-300">450
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Jumlah Jurusan -->
            <section class="flex justify-center">
                <div
                    class="overflow-x-auto group w-full bg-base-300 shadow-xl rounded-xl p-6 hover:bg-warning ease-in-out duration-300">
                    <div class="flex flex-row justify-center items-center cursor-pointer gap-x-4">
                        <span data-feather="crosshair"
                            class="w-auto h-12 group-hover:text-warning-content ease-in-out duration-300"></span>
                        <script>
                            feather.replace()
                        </script>
                        <div class="w-full flex flex-col items-start gap-y-2">
                            <h1
                                class="sm:text-base md:text-lg lg:text-lg font-bold group-hover:text-warning-content ease-in-out duration-300">
                                Jumlah Jurusan</h1>
                            <p class="font-semibold group-hover:text-warning-content ease-in-out duration-300">450
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Jumlah Akun Peserta -->
            <section class="flex justify-center">
                <div
                    class="overflow-x-auto group w-full bg-base-300 shadow-xl rounded-xl p-6 hover:bg-warning ease-in-out duration-300">
                    <div class="flex flex-row justify-center items-center cursor-pointer gap-x-4">
                        <span data-feather="user"
                            class="w-auto h-12 group-hover:text-warning-content ease-in-out duration-300"></span>
                        <script>
                            feather.replace()
                        </script>
                        <div class="w-full flex flex-col items-start gap-y-2">
                            <h1
                                class="sm:text-base md:text-lg lg:text-lg font-bold group-hover:text-warning-content ease-in-out duration-300">
                                Jumlah Akun Peserta</h1>
                            <p class="font-semibold group-hover:text-warning-content ease-in-out duration-300">450
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Jumlah Peserta -->
            <section class="flex justify-center">
                <div
                    class="overflow-x-auto group w-full bg-base-300 shadow-xl rounded-xl p-6 hover:bg-warning ease-in-out duration-300">
                    <div class="flex flex-row justify-center items-center cursor-pointer gap-x-4">
                        <span data-feather="clipboard"
                            class="w-auto h-12 group-hover:text-warning-content ease-in-out duration-300"></span>
                        <script>
                            feather.replace()
                        </script>
                        <div class="w-full flex flex-col items-start gap-y-2">
                            <h1
                                class="sm:text-base md:text-lg lg:text-lg font-bold group-hover:text-warning-content ease-in-out duration-300">
                                Jumlah Terdaftar</h1>
                            <p class="font-semibold group-hover:text-warning-content ease-in-out duration-300">450
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="w-full">
            <div class="flex flex-col bg-base-300 rounded-xl shadow-xl mx-6 my-6 p-6 gap-y-6">
                <!-- Perbandingan Peserta Berdasarkan Jenis Kelamin -->
                @include('admin.dashboard.jenis-kelamin-chart')

                <!-- Perbandingan Peserta Berdasarkan Jurusan -->
                @include('admin.dashboard.jurusan-chart')

                <!-- Perbandingan Peserta Berdasarkan Jenis Kelamin & Jurusan -->
                @include('admin.dashboard.jenis-kelamin-dan-jurusan-chart')
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
