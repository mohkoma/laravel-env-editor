<?php

namespace Mohkoma\LaravelEnvEditor;

use Illuminate\Support\ServiceProvider;

class EnvEditorServiceProvider extends ServiceProvider
{
    /**
     * 
     */
    public function boot()
    {
        // Config
        $this->publishes([
            __DIR__.'/config/env_editor.php' => config_path('env_editor.php'),
        ], 'env-editor-config');

        // Default config
        $this->mergeConfigFrom(
            __DIR__.'/config/env_editor.php', 'env_editor'
        );

        // Routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'env-editor');

        // Publish
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/env-editor'),
        ], 'env-editor-views');

        // Assets
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/env-editor'),
        ], 'env-editor-assets');
    }

    /**
     * 
     */
    public function register()
    {
        $this->app->make('Mohkoma\LaravelEnvEditor\EnvEditorController');
    }

    /**
     * 
     */
    public function provides()
    {
        //
    }
}
