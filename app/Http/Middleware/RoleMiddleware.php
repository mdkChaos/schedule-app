<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();

        if (!$user || !$user->role) {
            abort(403);
        }

        $roleLevel = Role::where('name', $role)->value('level');

        if ($roleLevel === null || $user->role->level < $roleLevel) {
            Log::warning("Access denied for user ID: {$user->id} with level {$user->role->level}");
            abort(403);
        }

        return $next($request);
    }
}
