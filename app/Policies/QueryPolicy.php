<?php

namespace App\Policies;

use App\Models\Query;;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QueryPolicy
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
        return $user->hasRole(['super-admin','admin','user','developer']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Query $query)
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
        return $user->hasRole(['super-admin','admin','user','developer']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Query $query
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Query $query)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Query $query
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Query $query)
    {
        return $user->hasRole(['super-admin','admin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Query $query
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Query $query)
    {
        return $user->hasRole(['super-admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Query $query
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Query $query)
    {
        return $user->hasRole(['super-admin']);
    }
}
