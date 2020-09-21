<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        App\Models\Task::class => App\Policies\TaskPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(AccessGate $gate)
    {
        $this->registerPolicies();
        $gate->before(function ($user) {
            if ($user->id == 2) {
                return true;
            }
        });
    }
}
