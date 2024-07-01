<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            $roles = ['handler-admin', 'agent-admin'];
            return in_array($user->role, $roles);
        });

        Gate::define('isGestionnaire', function ($user) {
            $roles = ['handler-op', 'agent-op, prospect'];
            return in_array($user->role, $roles);
        });

        Gate::define('accessPage', function ($user) {
            $roles = ['prospect'];
            return in_array($user->role, $roles);
        });

        // Add more gates as needed
    }

}
