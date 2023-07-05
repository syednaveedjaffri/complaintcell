<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Complaincategory;

class ComplaincategoryPolicy
{
    use HandlesAuthorization;

  /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategory $complaincategory;
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
     * @param \App\Models\Complaincategory $complaincategory;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Complaincategory $complaincategory)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategory $complaincategory;
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
     * @param \App\Models\Complaincategory $complaincategory;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Complaincategory $complaincategory)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategory $complaincategory;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Complaincategory $complaincategory)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategory $complaincategory;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Complaincategory $complaincategory)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategory $complaincategory;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Complaincategory $complaincategory)
    {
        return $user->hasRole(['super-admin','admin']);
    }
}
