<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = NULL): Response
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->akses == "1") {
                return redirect()->to("/admin/dashboard");
            } else if (Auth::user()->akses == "2") {
                return redirect()->to("/management/dashboard");
            } else if (Auth::user()->akses == "3") {
                return redirect()->to("/user/dashboard");
            }
        }
    }
}
