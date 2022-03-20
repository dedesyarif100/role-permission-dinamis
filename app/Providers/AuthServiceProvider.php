<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
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
        Role::class => RolePolicy::class,
        UserRole::class => UserRole::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('role', function(User $user, $role) {
            $role = Role::where('name', $role)->first();
            $userRole = UserRole::where('user_id', $user->id)->where('role_id', $role->id)->first();
            return !is_null($userRole);
        });

        // Gate::define('isAdmin', function(User $user) {
        //     $role = Role::where('name', 'admin')->first();
        //     return !is_null($user->userRoles()->where('role_id', $role->id)->first());
        // });

        // Gate::define('isUser', function(User $user) {
        //     $role = Role::where('name', 'user')->first();
        //     return !is_null($user->userRoles()->where('role_id', $role->id)->first());
        // });
    }
}
