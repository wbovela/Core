<?php

namespace LaravelEnso\Core;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LaravelEnso\Core\App\Models\User;
use LaravelEnso\Core\App\Policies\UserPolicies;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        User::class => UserPolicies::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('accessRoute', function ($user, $route) {
            return $user->hasAccessTo($route);
        });
    }
}