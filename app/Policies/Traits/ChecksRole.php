<?php

namespace App\Policies\Traits;

use App\Models\Role;
use App\Models\User;

trait ChecksRole
{
    /**
     * Check if user has at least the minimal level among given roles.
     */
    public function hasRole(User $user, string $role): bool
    {
        if (!$user || !$user->role) {
            return false;
        }
        $roleLevel = Role::where('name', $role)->value('level');

        return $roleLevel !== null && $user->role->level >= $roleLevel;
    }
}
