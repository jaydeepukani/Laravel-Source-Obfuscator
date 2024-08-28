<?php

namespace JaydeepUkani\LaravelSourceObfuscator;

use Illuminate\Support\ServiceProvider;

class SourceEncryptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register hard-delete-expired artisan command
        $this->commands([
            SourceEncryptCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config file
        $configPath = __DIR__.'/../config/source-obfuscator.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('source-obfuscator.php');
        } else {
            $publishPath = base_path('config/source-obfuscator.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');
    }
}
