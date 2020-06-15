<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 2) {
            return redirect()->route('administrator');
        }

        if (Auth::user()->role == 3) {
            return redirect()->route('operatorperumahan');
        }

        if (Auth::user()->role == 4) {
            return redirect()->route('operatorpertamanan');
        }

        if (Auth::user()->role == 5) {
            return redirect()->route('operatorpermukiman');
        }
    }
}
