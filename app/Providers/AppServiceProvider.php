<?php

namespace App\Providers;
use Illuminate\Auth\Events\Registered;
use App\Listeners\AssignUserRole;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**public const HOME = '/categories';
     * Register any application services.
     */

    /**
     * The namespace for the application's controllers.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';
    public function register(): void
    {
        
    }
    
    protected $listen = [
        Registered::class => [
            AssignUserRole::class,
        ],
        \Illuminate\Auth\Events\Registered::class => [
            \App\Listeners\AssignUserRole::class,
        ],
    ];
    public function map()
    {
        $this->mapWebRoutes(); // Ensure the method is defined below
        $this->mapApiRoutes();
        $this->mapAdminRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
    
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    
    }
   
}
