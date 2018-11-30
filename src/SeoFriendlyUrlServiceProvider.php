<?php

namespace omegachien\SeoFriendlyUrl;

use Illuminate\Support\ServiceProvider;

class SeoFriendlyUrlServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'omegachien');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'omegachien');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/seofriendlyurl.php', 'seofriendlyurl');

        // Register the service the package provides.
        $this->app->singleton('seofriendlyurl', function ($app) {
            return new SeoFriendlyUrl;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['seofriendlyurl'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/seofriendlyurl.php' => config_path('seofriendlyurl.php'),
        ], 'seofriendlyurl.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/omegachien'),
        ], 'seofriendlyurl.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/omegachien'),
        ], 'seofriendlyurl.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/omegachien'),
        ], 'seofriendlyurl.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
