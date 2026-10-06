<?php

namespace App\Providers;

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
        Gate::define('publish-articles', function ($user) {
            return $user->is_admin || $user->is_publisher;
        });

        Gate::define('manage-categories', function ($user) {
            return $user->is_admin;
        });

        Gate::define('see-article-user', function ($user) {
            return $user->is_admin;
        });
    }
}
