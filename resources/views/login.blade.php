<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body>
    <!-- Content -->
    <content class="flex flex-col justify-center items-center h-screen">
        <div class="basis-3 border boder-base-content rounded-xl p-6">
            <h1 class="text-2xl text-center font-bold mb-4">Login</h1>
            <form action="{{ route('proses-login') }}" method="post" class="flex flex-col gap-y-4">
                @csrf
                <label class="input input-bordered input-accent flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                    </svg>
                    <input type="text" name="username" class="grow ml-2" placeholder="Username" />
                </label>
                <label class="input input-bordered input-accent flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="password" name="password" class="grow ml-2" placeholder="Password" />
                </label>
                <button type="submit" class="btn btn-primary font-semibold w-full mt-2">Submit</button>
            </form>
        </div>
    </content>

    @if (session('akun_tidak_ditemukan') || session('password_salah') || session('no_token') || session('validator_fails'))
        <script>
            // Buka modal menggunakan JavaScript
            document.querySelector(".modal").showModal();
        </script>
        <dialog class="modal">
            <div class="modal-box">
                @if (session('akun_tidak_ditemukan'))
                    <h3 class="text-lg font-bold">Akun Tidak Ditemukan</h3>
                    <p class="py-4">{{ session('akun_tidak_ditemukan') }}</p>
                @elseif (session('password_salah'))
                    <h3 class="text-lg font-bold">Password Salah</h3>
                    <p class="py-4">{{ session('password_salah') }}</p>
                @elseif (session('no_token'))
                    <h3 class="text-lg font-bold">No Token</h3>
                    <p class="py-4">{{ session('no_token') }}</p>
                @elseif (session('validator_fails'))
                    <h3 class="text-lg font-bold">Validasi Gagal</h3>
                    <ul class="py-4">
                        @foreach (session('validator_fails')->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
