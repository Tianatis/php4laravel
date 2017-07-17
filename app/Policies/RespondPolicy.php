<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Respond;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class RespondPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return  $user->admin->isAdministrator() && Auth::guard('admins')->check();
    }


    public function update(User $user)
    {
        return  $user->admin->isAdministrator() && Auth::guard('admins')->check();
    }


    public function delete(User $user)
    {
       return $user->admin->isAdministrator() && Auth::guard('admins')->check();
    }
}
