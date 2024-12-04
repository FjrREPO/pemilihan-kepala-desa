<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->role === 'pemilih') {
                    return redirect()->route('pemilih.vote');
                }
            }
        }

        return $next($request);
    }
}
