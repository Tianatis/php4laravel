<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\Respond;
use Illuminate\Auth\Access\HandlesAuthorization;

class RespondPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the respond.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Respond  $respond
     * @return mixed
     */
    public function view(User $user, Respond $respond)
    {

    }

    /**
     * Determine whether the user can create responds.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        return  $user->isAdministrator();
    }

    /**
     * Determine whether the user can update the respond.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Respond  $respond
     * @return mixed
     */
    public function update(User $user, Respond $respond)
    {
        return  $user->isAdministrator();
    }

    /**
     * Determine whether the user can delete the respond.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Respond  $respond
     * @return mixed
     */
    public function delete(Admin $user)
    {
       return $user->getTable() == 'admins' && $user->isAdministrator();
    }
}
