<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
	    // 'App\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
	    $this->registerPolicies();
	  // superuser doesn't need permissions
	  // https://docs.spatie.be/laravel-permission/v3/basic-usage/super-admin/
	  Gate::before(function ($user, $ability) {
	     return $user->hasRole('Superuser') ? true : null;
	  });

	    //
	}
}
