<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>

<body>
    <!-- Navbar -->
    @include('navbar')

    <!-- Header -->
    <header class="bg-base-300 flex flex-col justify-center items-center rounded-xl shadow-xl mx-6 my-5 p-5">
        <h1 class="text-4xl font-bold">Formulir Pendaftaran</h1>
    </header>

    <!-- Content -->
    <content>
        <form action="{{ route('edit-detail-peserta', ['id' => $registration->id]) }}" method="post"
            class="container mx-auto bg-base-300 rounded-xl shadow-xl p-5 mb-5">
            @csrf
            <!-- Input Fields -->
            <div class="grid grid-cols-2 gap-x-5">
                <!-- Nama Lengkap -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </div>
                    <input type="text" name="name" value="{{ $registration->name }}"
                        class="input input-bordered input-accent" readonly />
                </label>
                <!-- NISN -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">NISN</span>
                    </div>
                    <input type="text" name="nisn" value="{{ $registration->nisn }}"
                        class="input input-bordered input-accent" />
                </label>
                <!-- Birth Place -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tempat Lahir</span>
                    </div>
                    <input type="text" name="birth_place" value="{{ $registration->birth_place }}"
                        class="input input-bordered input-accent" />
                </label>
                <!-- Birth Date -->
                <label class="form-control w-full col-span-2">
                    <div class="label">
                        <span class="label-text">Tanggal Lahir</span>
                    </div>
                    <input type="date" name="birth_date" value="{{ $registration->birth_date }}"
                        class="input input-bordered input-accent" />
                </label>
                <!-- Program Keahlian -->
                <label class="form-control w-full col-span-2">
                    <div class="label">
                        <span class="label-text">Program Keahlian</span>
                    </div>
                    <select name="program_id" class="select select-bordered select-accent">
                        @foreach ($program as $item)
                            <option value="{{ $item->id }}"
                                {{ $registration->program_id == $item->programs_id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </label>
                <button type="submit" class="btn btn-primary font-bold col-span-2 mt-6">Edit</button>
            </div>
        </form>
    </content>

    <!-- Footer -->
    @include('footer')
</body>

</html>
