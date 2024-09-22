<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TamuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session("id") && session("peran") === "admin")
            return redirect()->route("admin-dashboard");

        if (session("id") && session("peran") === "peserta")
            return redirect()->route("peserta-dashboard");

        return $next($request);
    }
}
