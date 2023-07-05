<?php

namespace App\Policies;

use App\Models\Campus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(['super-admin','admin']);
        // if($user->hasPermissionTo(''))
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Campus $campus)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Campus $campus)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Campus $campus)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Campus $campus)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Campus $campus)
    {
        return $user->hasRole(['super-admin','admin']);
    }
}
