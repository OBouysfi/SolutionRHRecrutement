<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Role;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */

     public function register()
     {
         $this->app->bind(Role::class, function () {
             return new Role();
         });
 
         $this->app->bind(Permission::class, function () {
             return new Permission();
         });
     }
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
