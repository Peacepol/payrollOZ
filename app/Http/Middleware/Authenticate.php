<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
  // dd(auth()->check());
    //    if(auth()->check()) {
    //     return $next($request);
    // }

    // return route('login', session('tenantcode'));
        if (!$request->expectsJson()) {           
            return route('login', session('tenantcode'));
        }
    }
}
