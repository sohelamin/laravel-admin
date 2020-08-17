<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $role
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        if ($request->user()->hasRole($role) || !$role) {
            return $next($request);
        }

        abort(403, 'This action is unauthorized.');
    }
}
