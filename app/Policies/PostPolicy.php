<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Menentukan apakah user bisa mengupdate post.
     * (Acara 24 - Prosedur 2b: Mendefinisikan Otorisasi dalam Policy)
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Menentukan apakah user bisa menghapus post.
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Menentukan apakah user bisa membuat post.
     */
    public function create(User $user)
    {
        return true; // Semua user yang login bisa membuat post
    }
}
