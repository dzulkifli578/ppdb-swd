<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class PeranMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $cookie = request()->cookie("jwt");

        if (!$cookie)
            return redirect()->route("login")->with("error", "Tidak ada cookie");

        try {
            $decoded = JWT::decode($cookie, new Key(env("APP_KEY"), "HS384"));

            session([
                "id" => $decoded->id,
                "nama_pengguna" => $decoded->nama_pengguna,
                "peran" => $decoded->peran,
            ]);

            // Redirect sesuai peran
            if ($decoded->peran === "peserta") {
                return redirect()->route('peserta-dashboard');
            } elseif ($decoded->peran === "admin") {
                return redirect()->route('admin-dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route("login")->with("jwt_error", "JWT tidak dikenali.");
        }

        return $next($request);
    }
}