<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public $bindings = [
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repository\Interfaces\UserRepositoryInterface' => 'App\Repository\UserRepository',


        'App\Services\Interfaces\SubjectServiceInterface' => 'App\Services\SubjectService',
        'App\Repository\Interfaces\SubjectRepositoryInterface' => 'App\Repository\SubjectRepository',

        'App\Services\Interfaces\TestServiceInterface' => 'App\Services\TestService',
        'App\Repository\Interfaces\TestRepositoryInterface' => 'App\Repository\TestRepository',
    ];

    public function register(): void
    {
        foreach($this->bindings as $key => $val) {
            $this->app->bind($key, $val);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
