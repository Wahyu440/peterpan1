<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthDonorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Jika donor belum terotentikasi, redirect ke halaman login
            return redirect()->route('donor.login');
        }

        // Jika donor terotentikasi, lanjutkan ke sumber daya yang diminta
        return $next($request);
    }
}