<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SaveCookie
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
        $ip = $request->ip();
        $user = $request->user();
        if($user->rol_id == 1 && $ip == "127.0.0.1"){
            $nueva_cookie = cookie('origin_sesion', $ip, 60);
            return $next($request)->withCookie($nueva_cookie);
        }

        return $next($request);
    }
}
