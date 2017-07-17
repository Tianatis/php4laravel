<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return isset($user);
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id || ($user->admin->isAdministrator() && Auth::guard('admins')->check());
    }


}
