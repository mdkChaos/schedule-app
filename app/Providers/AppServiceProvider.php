<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::enableForeignKeyConstraints();

        Paginator::useBootstrapFive();

        Blade::if('role', function ($roleName) {
            $roles = Cache::remember('roles_levels', 86400, function () {
                return Role::pluck('level', 'name')->mapWithKeys(fn($level, $name) => [strtolower($name) => $level]);
            });

            return Auth::check() && isset($roles[strtolower($roleName)]) && Auth::user()->role->level >= $roles[strtolower($roleName)];
        });
    }
}
