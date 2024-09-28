<header class="bg-base-300 flex flex-row justify-between items-center rounded-xl shadow-xl m-6 p-6">
    <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mr-6">{{ $header['name'] }}</h1>
    <div class="breadcrumbs text-sm">
        <ul>
            @if (is_array($header['breadcrumbs']))
                @foreach ($header['breadcrumbs'] as $breadcrumb)
                    <li><a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['label'] }}</a></li>
                @endforeach
            @else
                <li><a href="{{ $header['route'] }}">{{ $header['breadcrumbs'] }}</a></li>
            @endif
        </ul>
    </div>
</header>
