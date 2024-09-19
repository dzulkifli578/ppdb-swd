<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session("username") && session("role") === "admin")
            return redirect()->route('admin-dashboard');

        if (session("username") && session("role") === "peserta")
            return redirect()->route('peserta-dashboard');

        return $next($request);
    }
}
