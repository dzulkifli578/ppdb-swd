<!-- Greeting -->
@php
    use Carbon\Carbon;

    $currentHour = Carbon::now()->format('H');
    if ($currentHour >= 5 && $currentHour < 12) {
        $greeting = 'Selamat Pagi';
    } elseif ($currentHour >= 12 && $currentHour < 15) {
        $greeting = 'Selamat Siang';
    } elseif ($currentHour >= 15 && $currentHour < 18) {
        $greeting = 'Selamat Sore';
    } else {
        $greeting = 'Selamat Malam';
    }
@endphp

<!-- Menu -->
@php
    $menu = [
        ['route' => 'admin-dashboard', 'label' => 'Dashboard'],
        ['route' => 'admin-akun', 'label' => 'Akun'],
        ['route' => 'admin-pengumuman', 'label' => 'Pengumuman'],
        ['route' => 'admin-data-peserta', 'label' => 'Data Peserta'],
        ['route' => 'admin-jurusan', 'label' => 'Jurusan'],
    ];
@endphp

<!-- Navbar -->
<nav>
    <div class="navbar bg-base-100 border-b border-base-content">
        <div class="navbar-start">
            <!-- Trigger Drawer ketika logo atau teks diklik -->
            <label for="my-drawer" class="flex flex-row items-center ml-4 cursor-pointer">
                <img src="{{ asset('img/swadhipa.png') }}" alt="Logo Swadhipa" class="h-12 mr-4">
                <p class="text-nowrap text-base md:text-xl lg:text-2xl font-semibold">SMK Swadhipa 2 Natar</p>
            </label>
        </div>
        <div class="navbar-end">
            <ul class="menu menu-horizontal px-1 font-semibold">
                <li>
                    <form action="{{ route('admin-logout') }}" method="post" class="hidden md:block">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Drawer -->
<div class="drawer z-10">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
    </div>
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-300 text-base-content min-h-full w-50 p-6">
            <!-- Sidebar content here -->
            <div class="w-full flex flex-col justify-center">
                <p class="sm:text-base md:text-lg lg:text-2xl font-semibold">{{ $greeting }},
                    {{ session('nama_pengguna') }}</p>
                <div class="divider divider-accent"></div>
            </div>
            <div class="sm:text-base md:text-base lg:text-lg">
                @foreach ($menu as $item)
                    <li><a href="{{ route($item['route']) }}"
                            class="{{ Route::is($item['route']) ? 'text-primary' : '' }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach
                <li>
                    <form action="{{ route('admin-logout') }}" method="post" class="sm:block md:hidden">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </div>
        </ul>
    </div>
</div>
