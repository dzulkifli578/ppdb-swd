<nav>
    <div class="navbar bg-base-100 border-b border-base-content">
        <div class="navbar-start">
            <a class="flex flex-row items-center ml-4 cursor-pointer">
                <img src="{{ asset('img/swadhipa.png') }}" alt="Logo Swadhipa" class="h-12 mr-4">
                <p class="text-nowrap text-base md:text-xl lg:text-2xl font-semibold">SMK Swadhipa 2 Natar</p>
            </a>
        </div>
        <div class="navbar-end">
            <ul class="menu menu-horizontal px-1 font-semibold">
                <li class="hidden sm:block">
                    <form action="{{ route('peserta-logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                <li>
                    <details>
                        <summary>Lainnya</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a href="{{ route('peserta-dashboard') }}">Beranda</a></li>
                            <li class="sm:hidden">
                                <form action="{{ route('admin-logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                    </details>
                </li>
            </ul>
        </div>
    </div>
</nav>
