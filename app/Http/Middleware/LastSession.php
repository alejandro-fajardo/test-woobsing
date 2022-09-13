<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LastSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){

        $last_sesion = $request->user()->last_sesion;
        $now_date = date("d-m-Y H:i:00",time());
        $minumun_date = strtotime(date("d-m-Y H:i:00",strtotime($now_date."- 1 days")));
        $date_session = strtotime($last_sesion);

        if ($last_sesion == null|| $date_session<$minumun_date) { 
            return response()->view('sesiones');
        }

        return $next($request);
    }
}
