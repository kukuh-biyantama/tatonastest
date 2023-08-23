<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role === 'superadmin') {
            return $next($request);
        }

        return response('Unauthorized action.', 403);
    }
}
