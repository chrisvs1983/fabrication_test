<?php

namespace Cvs\Fabrication\Providers;

use Illuminate\Support\ServiceProvider;

class FabricationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'fabrication');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'fabrication');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('fabrication', function ($app) {
            return $this->app->make('Cvs\Fabrication\Fabrication');
        });

// Bind Material to repository
        $this->app->bind(
            \Cvs\Fabrication\Interfaces\MaterialRepositoryInterface::class,
            \Cvs\Fabrication\Repositories\Eloquent\MaterialRepository::class
        );
        // Bind Product to repository
        $this->app->bind(
            \Cvs\Fabrication\Interfaces\ProductRepositoryInterface::class,
            \Cvs\Fabrication\Repositories\Eloquent\ProductRepository::class
        );

        $this->app->register(\Cvs\Fabrication\Providers\AuthServiceProvider::class);
        $this->app->register(\Cvs\Fabrication\Providers\EventServiceProvider::class);
        $this->app->register(\Cvs\Fabrication\Providers\RouteServiceProvider::class);
        // $this->app->register(\Cvs\Fabrication\Providers\WorkflowServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fabrication'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('cvs/fabrication.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/fabrication')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/fabrication')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
