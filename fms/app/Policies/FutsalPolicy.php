<?php

namespace App\Policies;

use App\User;
use App\Futsal;
use Illuminate\Auth\Access\HandlesAuthorization;

class FutsalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any futsals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the futsal.
     *
     * @param  \App\User  $user
     * @param  \App\Futsal  $futsal
     * @return mixed
     */
    public function view(User $user, Futsal $futsal)
    {
        //
    }

    /**
     * Determine whether the user can create futsals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the futsal.
     *
     * @param  \App\User  $user
     * @param  \App\Futsal  $futsal
     * @return mixed
     */
    public function update(User $user, Futsal $futsal)
    {

        return $user->id==$futsal->user_id;
    }

    /**
     * Determine whether the user can delete the futsal.
     *
     * @param  \App\User  $user
     * @param  \App\Futsal  $futsal
     * @return mixed
     */
    public function delete(User $user, Futsal $futsal)
    {
        return $user->id==$futsal->user_id;
    }

    /**
     * Determine whether the user can restore the futsal.
     *
     * @param  \App\User  $user
     * @param  \App\Futsal  $futsal
     * @return mixed
     */
    public function restore(User $user, Futsal $futsal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the futsal.
     *
     * @param  \App\User  $user
     * @param  \App\Futsal  $futsal
     * @return mixed
     */
    public function forceDelete(User $user, Futsal $futsal)
    {
        //
    }
}
