<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
class ArticlePolicy
{
    use HandlesAuthorization;


    public function view(User $user)
    {
        return isset($user);
    }
    public function add_for_view(User $user)
    {
        return $user->isAuthor() && Auth::check();
    }

    public function create(User $user)
    {
       return ($user->admin->isEditor() || $user->admin->isSuperAdmin()) && Auth::guard('admins')->check();
    }


    public function update(User $user)
    {
        return ($user->admin->isEditor() || $user->admin->isSuperAdmin()) && Auth::guard('admins')->check();
    }


    public function delete(User $user)
    {
        return ($user->admin->isEditor() || $user->admin->isSuperAdmin()) && Auth::guard('admins')->check();
    }

    public function forceDelete(User $user)
    {
        return $user->admin->isSuperAdmin() && Auth::guard('admins')->check();
    }
}
