<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PesertaMiddleware
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
        $peran = session("peran");

        if (!$peran)
            return redirect()->route("login")->with("error", "Anda harus login terlebih dahulu.");

        return $next($request);
    }
}
