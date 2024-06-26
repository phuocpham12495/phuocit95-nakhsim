<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function delete(User $user, Comment $comment): bool {
        return $comment->user->is($user);
    }

    public function exposeAPI(User $user, Comment $comment): bool {
        return $comment->user->is($user);
    }
}
