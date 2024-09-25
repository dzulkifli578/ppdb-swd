<header class="bg-base-300 flex flex-row justify-between items-center rounded-xl shadow-xl mx-6 my-6 p-6">
    <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mr-6">{{ $header['name'] }}</h1>
    <div class="breadcrumbs text-sm">
        <ul>
            <li><a href="{{ $header['route'] }}">{{ $header['breadcrumbs'] }}</a></li>
        </ul>
    </div>
</header>
