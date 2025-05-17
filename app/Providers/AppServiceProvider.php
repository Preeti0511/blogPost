<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin';
        });

          Gate::define('view_admin_profile', function (User $user, User $profileadmin) {
            return $user->id === $profileadmin->id;
        });
         Gate::define('view_user_profile', function (User $user, User $profileUser) {
            return $user->id === $profileUser->id;
        });
        Gate::define('update_user', function (User $user, User $userid) {
            return $user->id === $userid->id;
        });
         Gate::define('update_post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
         Gate::define('update_comment', function (User $user, Comment $commentid) {
            return $user->id === $commentid->user_id;
        });
    }
}
