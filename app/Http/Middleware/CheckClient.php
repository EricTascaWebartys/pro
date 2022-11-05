<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() === null) return redirect()->route('homepage');
        if(Auth::user() && Auth::user()->role === "ROLE_CLIENT" &&  Auth::user()->active === 1 || Auth::user()->role === "ROLE_DEV") return $next($request);
        return redirect()->route('logout');
    }
}
