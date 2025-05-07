<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,  ...$roles): Response
    {
        $user = Auth::user();
        if (!$user || !$user->role) {
            abort(403);
        }

        $minLevel = Role::whereIn('name', $roles)->min('level');

        if ($user->role->level >= $minLevel) {
            return $next($request);
        }

        abort(403);
    }
}
