<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class AdminPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
       return $user->admin->isSuperAdmin() && Auth::guard('admins')->check();
    }


    public function create(User $user)
    {
        return $user->admin->isSuperAdmin() && Auth::guard('admins')->check();
    }


    public function update(User $user)
    {
        return $user->admin->isSuperAdmin() && Auth::guard('admins')->check();
    }


    public function delete(User $user)
    {
        return $user->admin->isSuperAdmin() && Auth::guard('admins')->check();
    }
}
