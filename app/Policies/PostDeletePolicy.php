<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostDeletePolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, Post $post){
        return $post->user_id == $user->id;
    }
}
