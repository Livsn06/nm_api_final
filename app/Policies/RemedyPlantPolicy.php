<?php

namespace App\Policies;

use App\Models\RemedyPlant;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RemedyPlantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RemedyPlant $remedyPlant): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RemedyPlant $remedyPlant): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RemedyPlant $remedyPlant): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RemedyPlant $remedyPlant): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RemedyPlant $remedyPlant): bool
    {
        return false;
    }
}
