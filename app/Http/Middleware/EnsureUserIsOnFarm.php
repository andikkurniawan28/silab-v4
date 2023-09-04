<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsOnFarm
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
        if(Auth()->user()->role_id <= 6){
            return $next($request);
        }
        else if(Auth()->user()->role_id >= 9 && Auth()->user()->role_id <= 10){
            return $next($request);
        }
        return redirect()->back()->with("fail", "Anda tidak memiliki akses!");
    }
}
