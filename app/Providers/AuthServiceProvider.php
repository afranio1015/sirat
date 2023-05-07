<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [        
    ];

    public function boot(): void
    {
        // $this->registerPolicies();

        Gate::define('isAdmin', function(User $user ){
            return $user->type_user === 1;
        });
    }
}
