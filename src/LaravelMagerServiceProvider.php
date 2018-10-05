<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 20/09/18
 * Time: 11:01
 */

namespace Faizalami\LaravelMager;


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
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mager');

        $this->publishes([
            __DIR__ . '/../config/laravel-mager.php' => config_path('laravel-mager.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../public' => public_path('faizalami/laravel-mager'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/../mager-data' => base_path('mager-data'),
        ], 'vendor-data');
    }

    /**
     * @return void
     */
    public function register() {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-mager.php', 'mager'
        );
    }

}
