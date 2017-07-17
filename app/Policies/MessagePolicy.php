<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Message;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class MessagePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return  !$user->isAdmin() && Auth::check();
    }


    public function delete(User $user)
    {
       return $user->admin->isAdministrator() && Auth::guard('admins')->check();
    }
}
