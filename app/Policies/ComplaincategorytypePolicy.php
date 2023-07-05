<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Complaincategorytype;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComplaincategorytypePolicy
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
     * @param \App\Models\Complaincategorytype $complaincategorytype;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Complaincategorytype $complaincategorytype)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategorytype $complaincategorytype;
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
     * @param \App\Models\Complaincategorytype $complaincategorytype;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Complaincategorytype $complaincategorytype)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategorytype $complaincategorytype;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user,Complaincategorytype $complaincategorytype)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategorytype $complaincategorytype;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Complaincategorytype $complaincategorytype)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param \App\Models\Complaincategorytype $complaincategorytype;
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Complaincategorytype $complaincategorytype)
    {
        return $user->hasRole(['super-admin','admin']);
    }
}
