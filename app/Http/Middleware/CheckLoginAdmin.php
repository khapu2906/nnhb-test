<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdmin
{
    /**
       * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
     
    public function handle($request, Closure $next,$guard=NULL)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role == 0) {
                return redirect('admin/dashboard');
        }
        return $next($request);
    }
}
