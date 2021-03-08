<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoginMember
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

        if (Auth::guard($guard)->check() && Auth::user()->role == 1) {
            return redirect('member');
        }
        return $next($request);
    }
}
