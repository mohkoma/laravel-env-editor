<?php

use Mohkoma\LaravelEnvEditor\EnvEditorController;
use Illuminate\Support\Facades\Route;

/**
 * Register the routes
 */
Route::middleware(config('env_editor.middlewares'))->namespace('Mohkoma\LaravelEnvEditor')->group(function() {
    Route::get(__pickEnvRoute('dev.environment'), [EnvEditorController::class, 'editor'])->name('dev.environment');
    Route::get(__pickEnvRoute('dev.environment.fetch'), [EnvEditorController::class, 'fetch'])->name('dev.environment.fetch');;
    Route::post(__pickEnvRoute('dev.environment.save'), [EnvEditorController::class, 'save'])->name('dev.environment.save');;
});

/**
 * Method to pick route
 * 
 * @param string $name
 * @return mixed
 */
function __pickEnvRoute(string $name): mixed
{
    // Get all the config routes
    $routes = config('env_editor.routes');
    // Return the route
    return $routes[$name] ?? throw new \RuntimeException("Unable to find route $name in the config file.");
}
