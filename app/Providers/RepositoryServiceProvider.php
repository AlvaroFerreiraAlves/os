<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserTypesRepository::class, \App\Repositories\UserTypesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserTypeUserRepository::class, \App\Repositories\UserTypeUserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CustomerRepository::class, \App\Repositories\CustomerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CompanyRepository::class, \App\Repositories\CompanyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ServiceRepository::class, \App\Repositories\ServiceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TypeOrderServiceRepository::class, \App\Repositories\TypeOrderServiceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OrderServiceRepository::class, \App\Repositories\OrderServiceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ServiceOrderServiceRepository::class, \App\Repositories\ServiceOrderServiceRepositoryEloquent::class);
        //:end-bindings:
    }
}
