<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
<<<<<<< HEAD
        //
=======
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    ];

    /**
     * Register any authentication / authorization services.
<<<<<<< HEAD
     */
    public function boot(): void
    {
=======
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
        //
    }
}
