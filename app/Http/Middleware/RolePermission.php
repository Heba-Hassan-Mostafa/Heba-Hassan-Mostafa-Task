<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_admin == 0) {
            abort(403);
        }
        // if($permission !== null && !auth()->user()->can($permission)) {
        //     abort(403);
        // }
        return $next($request);
    }
}
