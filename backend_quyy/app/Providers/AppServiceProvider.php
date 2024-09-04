<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $repositories = [
        \App\Repositories\Interfaces\RegistationRepositoryInterface::class => \App\Repositories\RegistationRepository::class,
        // \App\Repositories\Interfaces\UserRepositoryInterface::class => \App\Repositories\UserRepository::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->bindRepositories();
    }

    private function bindRepositories():void{
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
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
