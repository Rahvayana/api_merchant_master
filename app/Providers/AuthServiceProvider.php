<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register () {
        $this->app['auth']->provider('otp-based-auth-provider', function ($app, array $config) {
            return new MemberUserProvider();
        });
    }

    public function boot () {
        //
    }
}
