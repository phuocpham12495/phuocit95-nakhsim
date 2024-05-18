<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function delete(User $user, Post $post): bool {
        return $post->user->is($user);
    }

    public function exposeAPI(User $user, Post $post): bool {
        return $post->user->is($user);
    }
}
