<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
class UserPolicy
{
    use HandlesAuthorization;

    public function sendMessage(User $user)
    {
        return isset($user);
    }

    public function update(User $user)
    {
        return $user->admin->isAdministrator() && Auth::guard('admins')->check();
    }

    public function delete(User $user)
    {
        return $user->admin->isAdministrator() && Auth::guard('admins')->check();
    }

    public function adminView(User $user)
    {
        return ($user->admin->isEditor() ||$user->admin->isAdministrator()) && Auth::guard('admins')->check();
    }

    public function editorView(User $user)
    {
        return $user->admin->isEditor() && Auth::guard('admins')->check();
    }

    public function topAdminView(User $user)
    {
        return $user->admin->isAdministrator() && Auth::guard('admins')->check();
    }

    public function superAdminView(User $user)
    {
        return $user->admin->isSuperAdmin() && Auth::guard('admins')->check();
    }

}
