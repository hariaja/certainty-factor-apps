<?php

namespace App\Providers;

use App\Helpers\Enums\RoleType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */
  protected $policies = [
    //
  ];

  /**
   * Register any authentication / authorization services.
   */
  public function boot(): void
  {
    Gate::before(function ($user, $ability) {
      return $user->hasRole(RoleType::ADMIN->value) ? true : null;
    });

    Gate::define('roles.edit_update', function ($user) {
      return $user->can('roles.edit') && $user->can('roles.update');
    });
  }
}
