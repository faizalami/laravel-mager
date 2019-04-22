<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 20/09/18
 * Time: 11:01
 */

namespace Faizalami\LaravelMager;


use Faizalami\LaravelMager\Console\Commands\DatabaseCreateCommand;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelMagerServiceProvider
 * @package Faizalami\LaravelMager
 */
class LaravelMagerServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mager');

        $this->commands([
            DatabaseCreateCommand::class
        ]);

        $this->publishes([
            __DIR__ . '/../publishes/base-controller' => app_path('Http/Controllers/Base'),
        ], 'base-controller');

        $this->publishes([
            __DIR__ . '/../publishes/config' => config_path('/'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../publishes/public' => public_path('faizalami/laravel-mager'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../publishes/views' => resource_path('views'),
        ], 'view');

        $this->publishes([
            __DIR__ . '/../publishes/mager-data' => base_path('mager-data'),
        ], 'vendor-data');

        $this->publishes([
            __DIR__ . '/../publishes/swagger' => public_path('swagger'),
        ], 'swagger');
    }

    /**
     * @return void
     */
    public function register() {
        $this->mergeConfigFrom(
            __DIR__.'/../publishes/config/laravel-mager.php', 'mager'
        );
    }

}
