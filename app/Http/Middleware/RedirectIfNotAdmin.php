<?php

namespace BAKD\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // TODO: Add check here for future "superadmin" role, or whatever admin roles we decide to implement
            return redirect()->route('frontend.home');
        }

        return $next($request);
    }
}
