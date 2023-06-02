<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\AdminPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\MontirPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => [
            AdminPolicy::class,
            CustomerPolicy::class,
            MontirPolicy::class,
        ],
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', [AdminPolicy::class, 'viewAdmin']);
        Gate::define('customer', [CustomerPolicy::class, 'viewCustomer']);
        Gate::define('montir', [MontirPolicy::class, 'viewMontir']);
    }
}
