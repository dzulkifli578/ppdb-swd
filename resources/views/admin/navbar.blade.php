<nav>
    <div class="navbar bg-base-100 border-b border-base-content">
        <div class="navbar-start">
            <a class="flex flex-row items-center ml-4 cursor-pointer">
                <img src="{{ asset('img/swadhipa.png') }}" alt="Logo Swadhipa" class="h-12 mr-4">
                <p class="text-xl font-semibold">SMK Swadhipa 2 Natar</p>
            </a>
        </div>
        <div class="navbar-end">
            <ul class="menu menu-horizontal px-1 font-semibold">
                <li>
                    <form action="{{ route('admin-logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                <li>
                    <details>
                        <summary>Lainnya</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a href="{{ route('beranda') }}">Beranda</a></li>
                            <li><a href="{{ route('program-keahlian') }}">Program Keahlian</a></li>
                            <li><a href="{{ route('informasi-ppdb') }}">Informasi PPDB</a></li>
                            {{-- <li><a>Cara Pendaftaran</a></li> --}}
                            <li><a href="{{ route('formulir-pendaftaran') }}">Formulir Pendaftaran</a></li>
                            <li><a>Kontak</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>
</nav>
