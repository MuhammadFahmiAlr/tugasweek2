<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;
use App\Policies\PostPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ============================================================
        // ACARA 24 - Prosedur 1a: Cara Menggunakan Gates & Menentukan Gate
        // Gates didefinisikan di AppServiceProvider (Laravel 11)
        // ============================================================
        Gate::define('edit-post', function (User $user, $post) {
            return $user->id === $post->user_id;
        });

        // ============================================================
        // ACARA 24 - Prosedur 2c: Mendaftarkan Policy di AuthServiceProvider
        // Di Laravel 11, Policy didaftarkan di AppServiceProvider
        // ============================================================
        Gate::policy(Post::class, PostPolicy::class);
    }
}

