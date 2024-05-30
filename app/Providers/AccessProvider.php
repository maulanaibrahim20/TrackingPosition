<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AccessProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define("admin", function($user) {
            if (empty($user->akses)) {
                return redirect("/logout");
            } else {
                return $user->akses == "1";
            }
        });

        Gate::define("management", function($user) {
            if (empty($user->akses)) {
                return redirect("/logout");
            } else {
                return $user->akses == "2";
            }
        });

        Gate::define("user", function($user) {
            if (empty($user->akses)) {
                return redirect("/logout");
            } else {
                return $user->akses == "3";
            }
        });
    }
}
