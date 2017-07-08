<?php

namespace Cvs\Fabrication\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the package.
     *
     * @var array
     */
    protected $policies = [
        // Bind Material policy
        \Cvs\Fabrication\Models\Material::class => \Cvs\Fabrication\Policies\MaterialPolicy::class,
// Bind Product policy
        \Cvs\Fabrication\Models\Product::class => \Cvs\Fabrication\Policies\ProductPolicy::class,
    ];

    /**
     * Register any package authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
    }
}
