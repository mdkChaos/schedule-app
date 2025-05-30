<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workshop;
use App\Policies\Traits\ChecksRole;

class WorkshopPolicy
{
    use ChecksRole;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->hasRole($user, 'Admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Workshop $workshop): bool
    {
        return $this->hasRole($user, 'Admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->hasRole($user, 'Admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Workshop $workshop): bool
    {
        return $this->hasRole($user, 'Admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Workshop $workshop): bool
    {
        return $this->hasRole($user, 'Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Workshop $workshop): bool
    {
        return $this->hasRole($user, 'Admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Workshop $workshop): bool
    {
        return $this->hasRole($user, 'Admin');
    }
}
