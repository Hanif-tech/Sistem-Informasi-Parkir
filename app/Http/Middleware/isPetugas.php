<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;


class isPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->roles == 'ADMIN' ){
            return $next($request);
        }
        // if(Auth::check() && Auth::user()->roles == 'PETUGAS MASUK' || Auth::check() && Auth::user()->roles == 'PETUGAS KELUAR' || Auth::check() && Auth::user()->roles == 'PETUGAS RUANG' ){
        //     return $next($request);
        // }
        return redirect('/logout');
    }
}
