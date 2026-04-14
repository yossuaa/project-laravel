<?php

namespace App\Http\Middleware;

use Closure;

class SimpleAuth
{
    public function handle($request, Closure $next)
    {
        if (!session('login')) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
