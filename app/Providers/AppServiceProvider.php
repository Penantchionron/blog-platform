<?php

namespace App\Providers;
use Illuminate\Auth\Events\Registered;
use App\Listeners\AssignUserRole;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**public const HOME = '/categories';
     * Register any application services.
     */
    public const HOME = '/categories';
    public function register(): void
    {
        
    }
    
    protected $listen = [
        Registered::class => [
            AssignUserRole::class,
        ],
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
