<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$status) // ... berarti array
    {
        if(in_array($request->user()->employee->status,$status)){
            return $next($request);
        }
        Auth::logout();
        return redirect('login')->with('forbidden', 'Karyawan tidak aktif, silakan hubungi administrator terlebih dahulu');
    }
}
