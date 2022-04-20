<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // if(Auth::user() && Auth::user()->roles == 'PETUGAS MASUK'){
                //     return redirect()->route('petugas-masuk');
                // }else{
                //     return redirect()->route('petugas-keluar');
                // }
                return redirect('/petugas');
            }
        }

        return $next($request);
    }
}
