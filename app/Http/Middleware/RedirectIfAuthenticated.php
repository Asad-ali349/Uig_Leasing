<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        // dd('sdkfjk');
        // foreach ($guards as $guard) {
            if ($guard == "customer" && Auth::guard($guard)->check()) {
                return redirect('/customer/dashboard');
            }
        // }
            if ($guard == "dealer" && Auth::guard($guard)->check()) {
                return redirect('/dealer/dashboard');
            }
            if ($guard == "employee" && Auth::guard($guard)->check()) {
                return Auth::guard($guard)->user()->role;
            }
            if (Auth::guard($guard)->check()) {
                return redirect('/');
            }

        return $next($request);
    }
}
