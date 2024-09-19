<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class AdminMiddleware
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
        $jwt = Cookie::get("jwt");

        if (!$jwt)
            return $next($request);

        try {
            $decoded = JWT::decode($jwt, new Key(env("APP_KEY"), "HS256"));
        } catch (Exception $e) {
            return $next($request);
        }

        if ($decoded->role !== "admin")
            return $next($request);

        session([
            "username" => $decoded->username,
            "role" => $decoded->role
        ]);

        return $next($request);
    }
}
