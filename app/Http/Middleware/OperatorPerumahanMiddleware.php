<?php

namespace App\Http\Middleware;

use Closure;

class OperatorPerumahanMiddleware
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
        if(auth()->user()->role_id == 2){
            return $next($request);
        }
        return redirect('/beranda')->with('error','You have not admin access');
    }
}
