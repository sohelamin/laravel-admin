<?php

namespace Appzcoder\LaravelAdmin;

use File;
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
            __DIR__ . '/src/Middleware/' => app_path('Http/Middleware'),
        ]);

        $this->publishes([
            __DIR__ . '/src/migrations/' => database_path('migrations'),
        ]);

        $this->publishes([
            __DIR__ . '/src/Model/' => app_path(),
        ]);

        $this->publishes([
            __DIR__ . '/src/Controllers/' => app_path('Http/Controllers'),
        ]);

        $this->publishes([
            __DIR__ . '/src/resources/' => base_path('resources'),
        ]);

        $this->publishes([
            __DIR__ . '/src/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/laravel-admin'),
        ], 'views');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laravel-admin');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $menus = [];
        if (File::exists(__DIR__.'/resources/laravel-admin/menus.json')) {
            $menus = json_decode(File::get(__DIR__.'/resources/laravel-admin/menus.json'));
            view()->share('laravelAdminMenus', $menus);
        }
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

        $this->app->bind('Setting', \Appzcoder\LaravelAdmin\Setting::class);
    }
}
