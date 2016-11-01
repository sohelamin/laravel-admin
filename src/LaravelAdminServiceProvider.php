<?php

namespace Appzcoder\LaravelAdmin;

use Illuminate\Support\ServiceProvider;

class LaravelAdminServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->publishes([
            __DIR__ . '/publish/Middleware/' => app_path('Http/Middleware'),
        ]);

        $this->publishes([
            __DIR__ . '/publish/migrations/' => database_path('migrations'),
        ]);

        $this->publishes([
            __DIR__ . '/publish/Model/' => app_path(),
        ]);

        $this->publishes([
            __DIR__ . '/publish/Controllers/' => app_path('Http/Controllers'),
        ]);

        $this->publishes([
            __DIR__ . '/publish/views/' => base_path('resources/views'),
        ]);

        $router->middleware('roles', \App\Http\Middleware\CheckRole::class);

        include __DIR__ . '/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Appzcoder\LaravelAdmin\LaravelAdminCommand'
        );
    }
}
