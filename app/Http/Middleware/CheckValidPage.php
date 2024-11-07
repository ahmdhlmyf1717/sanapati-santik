<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckValidPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah rute yang diminta ada
        if (!Route::has($request->path())) {
            // Jika tidak ada, arahkan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Halaman tidak ditemukan!');
        }

        return $next($request);
    }
}
