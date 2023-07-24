<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use function Symfony\Component\String\u;

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
        Gate::define('admin', function () {
            $user =auth()->user();
            return ($user->permission <= 1);
        });

        Gate::define('manager', function () {
            $user = auth()->user();
            Log::debug($user);
            return ($user->permission < 10 or $user->permission == 21);
        });

        Gate::define('developer', function () {
            $user =auth()->user();
            return ($user->permission < 10 or $user->permission == 22);
        });

        Gate::define('user', function () {
            $user =auth()->user();
            return ($user->permission <= 99);
        });
    }
}
